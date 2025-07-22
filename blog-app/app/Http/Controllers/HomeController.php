<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = BlogEntry::latest()->paginate(5);
        $categories = Category::all();

        return view('blogs.index', [
            'posts' => $posts,
            'categories' => $categories,
            'title' => 'Home',
        ]);
    }
}
