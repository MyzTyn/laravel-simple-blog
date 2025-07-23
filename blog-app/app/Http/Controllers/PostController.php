<?php

namespace App\Http\Controllers;

use App\Models\BlogEntry;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = BlogEntry::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show(BlogEntry $post)
    {
        $categories = Category::all();

        return view('posts.show', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    // CRUD operations
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'categories' => 'array',
        ]);

        $blog = BlogEntry::create($data);
        Category::find($data['categories'])->each(function ($category) use ($blog) {
            $category->blogEntries()->attach($blog->id);
        });

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(BlogEntry $post)
    {
        $categories = Category::all();

        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, BlogEntry $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categories' => 'array',
        ]);

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully.');
    }

    public function destroy(BlogEntry $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
