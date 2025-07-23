<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Markdown;

class BlogEntry extends Model
{
    /** @use HasFactory<\Database\Factories\BlogEntryFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'image_link',
    ];

    // Define the relationship with the Category model
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_entry_category');
    }

    // Strip the content markdown
    public function strip_content()
    {
        return strip_tags(
            $this->parse_content()
        );
    }

    // Parse the content markdown
    public function parse_content()
    {
        return Markdown::parse($this->content);
    }
}
