<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(BlogEntry $post)
    {
        $categories = Category::all();

        return view('posts.index', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}
