<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->blogEntries()->latest()->paginate(5);
        return view('blogs.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            'title' => $category->name,
        ]);
    }
}
