<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use domain\Facades\BlogPostFacade;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogPostData = BlogPostFacade::all();

        return view('pages.dashboard.index', compact('blogPostData'));
    }

    public function create()
    {
        return view('pages.dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_active' => 'required|boolean',
        ]);

        BlogPostFacade::store($request->all());

        return redirect()->route('blog-posts.index')->with('success', 'Blog post created successfully');
    }

    public function edit(BlogPost $blogPost)
    {
        return view('pages.dashboard.edit', compact('blogPost'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_active' => 'required|boolean',
        ]);

        $blogPost->update($request->all());

        return redirect()->route('blog-posts.index')->with('success', 'Blog post updated successfully');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect()->route('blog-posts.index')->with('success', 'Blog post deleted successfully');
    }
}