<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // ToDo: Remove this
    public function index()
    {
        $posts = BlogEntry::latest()->paginate(5);
        $categories = Category::all();

        return view('blogs.index', [
            'title' => 'Home',
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
