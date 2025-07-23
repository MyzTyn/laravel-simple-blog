<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\BlogEntry;
use App\Models\Category;

class ArticleController extends Controller
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

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $blog = BlogEntry::create($data);

        if (!empty($data['categories'])) {
            $blog->categories()->sync($data['categories']);
        }

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

    public function update(ArticleRequest $request, BlogEntry $post)
    {
        $data = $request->validated();

        $post->update($data);

        if (!empty($data['categories'])) {
            $post->categories()->sync($data['categories']);
        } else {
            $post->categories()->sync([]);
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully.');
    }

    public function destroy(BlogEntry $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
