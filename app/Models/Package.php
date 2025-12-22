<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_category_id',
        'name',
        'slug',
        'price',
        'short_description',
        'status',
        'image',
        'content',
        'co_content',
    ];

    protected $casts = [
        'content' => 'array',
        'price' => 'decimal:2',
        'co_content' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(PackageCategory::class, 'package_category_id');
    }

    public function inquiries()
    {
        return $this->hasMany(PackageInquiry::class);
    }
}
