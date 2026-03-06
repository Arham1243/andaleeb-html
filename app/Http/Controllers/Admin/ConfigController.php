<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Hotel;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    use UploadImageTrait;

    public function logoManagement()
    {
        $title = 'Logo Management';
        $logo = Config::where('config_key', 'SITE_LOGO')->first();
        return view('admin.site-settings.logo-management', compact('title', 'logo'));
    }

    public function saveLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $config = Config::where('config_key', 'SITE_LOGO')->first();

        if ($request->hasFile('logo')) {
            $previousImage = $config->config_value ?? null;
            $imagePath = $this->uploadImage($request->file('logo'), 'logo', $previousImage);

            Config::updateOrCreate(
                ['config_key' => 'SITE_LOGO'],
                ['config_value' => $imagePath]
            );
        }

        return redirect()->back()->with('notify_success', 'Logo updated successfully!');
    }

    public function details()
    {
        $title = 'Update Details';
        $config = Config::pluck('config_value', 'config_key')->toArray();
        $commissionHotelIds = collect(explode(',', $config['HOTEL_COMMISSION_HOTEL_IDS'] ?? ''))
            ->map(fn($id) => (int) trim($id))
            ->filter()
            ->values()
            ->all();
        $selectedCommissionHotels = Hotel::whereIn('id', $commissionHotelIds)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('admin.site-settings.details', compact('title', 'config', 'selectedCommissionHotels', 'commissionHotelIds'));
    }

    public function searchHotels(Request $request)
    {
        $q = trim((string) $request->input('q', ''));
        $perPage = 20;

        $query = Hotel::query()->select(['id', 'name']);

        if ($q !== '') {
            $query->where('name', 'like', '%' . $q . '%');
        }

        $paginated = $query->orderBy('name')->paginate($perPage);

        return response()->json([
            'results' => $paginated->getCollection()->map(fn($hotel) => [
                'id' => $hotel->id,
                'text' => $hotel->name,
            ])->values(),
            'pagination' => [
                'more' => $paginated->hasMorePages(),
            ],
        ]);
    }

    public function saveDetails(Request $request)
    {
        $payload = $request->except('_token');

        $payload['HOTEL_COMMISSION_APPLY_ALL'] = $request->has('HOTEL_COMMISSION_APPLY_ALL') ? '1' : '0';

        $selectedHotelIds = $request->input('HOTEL_COMMISSION_HOTEL_IDS', []);
        if (!is_array($selectedHotelIds)) {
            $selectedHotelIds = [];
        }
        $payload['HOTEL_COMMISSION_HOTEL_IDS'] = implode(',', $selectedHotelIds);

        foreach ($payload as $field => $value) {
            Config::updateOrCreate(
                ['config_key' => $field],
                ['config_value' => $value]
            );
        }

        return redirect()->back()->with('notify_success', 'Details updated successfully!');
    }
}
