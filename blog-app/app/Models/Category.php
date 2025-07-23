<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Define the route key name for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Define the relationship with BlogEntry model
    public function blogEntries()
    {
        return $this->belongsToMany(BlogEntry::class, 'blog_entry_category');
    }

    // Automatically generate the slug from the name when creating or updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = \Illuminate\Support\Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = \Illuminate\Support\Str::slug($category->name);
        });
    }
}
