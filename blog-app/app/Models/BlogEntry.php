<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogEntry extends Model
{
    /** @use HasFactory<\Database\Factories\BlogEntryFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_entry_category');
    }
}
