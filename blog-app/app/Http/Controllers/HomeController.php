<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $posts = BlogEntry::latest()->paginate(5);
        $categories = Category::all();

        return view('index', [
            'title' => 'Home',
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
