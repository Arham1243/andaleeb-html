<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Traits\UploadImageTrait;
use App\Traits\GenerateSlugTrait;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    use UploadImageTrait, GenerateSlugTrait;
    public function index()
    {
        $title = 'Manage Packages';
        $packages = Package::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.packages.list', compact('packages', 'title'));
    }

    public function create()
    {
        $title = 'Add New Package';
        $categories = PackageCategory::where('status', 'active')->pluck('name', 'id');
        return view('admin.packages.add', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_category_id' => 'required|exists:package_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'short_description' => 'nullable|string',
            'overview' => 'nullable|string',
            'package_details' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'inclusion' => 'nullable|string',
            'exclusion' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'nullable|boolean',
            'nights' => 'nullable|integer',
            'days' => 'nullable|integer',
        ]);

        $slug = $request->filled('slug')
            ? $this->generateUniqueSlug($request->slug, Package::class)
            : $this->generateUniqueSlug($request->name, Package::class);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'), 'packages');
        }

        $content = [
            'overview' => $request->overview,
            'package_details' => $request->package_details,
            'itinerary' => $request->itinerary,
            'inclusion' => $request->inclusion,
            'exclusion' => $request->exclusion,
        ];

        Package::create([
            'package_category_id' => $request->package_category_id,
            'name' => $request->name,
            'slug' => $slug,
            'price' => $request->price,
            'short_description' => $request->short_description,
            'image' => $imagePath,
            'content' => $content,
            'status' => $request->status,
            'is_featured' => $request->is_featured,
            'nights' => $request->nights,
            'days' => $request->days,
        ]);

        return redirect()->route('admin.packages.index')->with('notify_success', 'Package created successfully!');
    }


    public function edit(Package $package)
    {
        $title = 'Edit Package - ' . $package->name;
        $categories = PackageCategory::where('status', 'active')->pluck('name', 'id');
        return view('admin.packages.edit', compact('package', 'title', 'categories'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'package_category_id' => 'required|exists:package_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'short_description' => 'nullable|string',
            'overview' => 'nullable|string',
            'package_details' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'inclusion' => 'nullable|string',
            'exclusion' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'nullable|boolean',
            'nights' => 'nullable|integer',
            'days' => 'nullable|integer',
        ]);

        $slug = $request->filled('slug')
            ? $this->generateUniqueSlug($request->slug, Package::class, 'slug', $package->id)
            : $this->generateUniqueSlug($request->name, Package::class, 'slug', $package->id);

        $imagePath = $package->image;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'), 'packages', $package->image);
        }

        $content = [
            'overview' => $request->overview,
            'package_details' => $request->package_details,
            'itinerary' => $request->itinerary,
            'inclusion' => $request->inclusion,
            'exclusion' => $request->exclusion,
        ];

        $package->update([
            'package_category_id' => $request->package_category_id,
            'name' => $request->name,
            'slug' => $slug,
            'price' => $request->price,
            'short_description' => $request->short_description,
            'image' => $imagePath,
            'content' => $content,
            'status' => $request->status,
            'is_featured' => $request->is_featured,
            'nights' => $request->nights,
            'days' => $request->days,
        ]);

        return redirect()->route('admin.packages.index')->with('notify_success', 'Package updated successfully!');
    }

    public function destroy(Package $package)
    {
        if ($package->image) {
            $this->deletePreviousImage($package->image);
        }
        $package->delete();
        return redirect()->route('admin.packages.index')->with('notify_success', 'Package deleted successfully!');
    }

    public function changeStatus(Package $package)
    {
        $newStatus = $package->status === 'active' ? 'inactive' : 'active';
        $package->update(['status' => $newStatus]);
        return redirect()->route('admin.packages.index')->with('notify_success', 'Package status changed successfully!');
    }
}
