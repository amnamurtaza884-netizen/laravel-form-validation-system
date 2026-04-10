<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'required|min:5',
            'file' => 'nullable|mimes:jpg,png,pdf|max:2048'
        ]);

        // ✅ FILE UPLOAD
        $fileName = null;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('uploads'), $fileName);
        }

        // ✅ STORE DATA
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'file' => $fileName
        ]);

        return redirect()->route('posts.index')->with('success', 'Post added successfully!');
    }

    // ✅ EDIT
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // ✅ UPDATE (FIXED VERSION)
    public function update(Request $request, Post $post)
    {
        // ✅ VALIDATION
        $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'required|min:5',
            'file' => 'nullable|mimes:jpg,png,pdf|max:2048'
        ]);

        // ✅ FILE UPDATE
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('uploads'), $fileName);
            $post->file = $fileName;
        }

        // ✅ UPDATE DATA (IMPORTANT FIX)
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'file' => $post->file // 👈 important fix
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
}