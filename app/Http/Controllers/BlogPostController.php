<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use domain\Facades\BlogPostFacade;

class BlogPostController extends ParentController
{
    public function index()
    {
        try {
            $posts = BlogPostFacade::all();

            return view('pages.dashboard.index', compact('posts'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function create()
    {
        try {
            return view('pages.dashboard.create');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            BlogPostFacade::store($request->all());

            return redirect()->route('blog-posts.index')->with('success', 'Blog post created successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit(BlogPost $blogPost)
    {
        try {
            return view('pages.dashboard.edit', compact('blogPost'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            $blogPost->update($request->all());

            return redirect()->route('blog-posts.index')->with('success', 'Blog post updated successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(BlogPost $blogPost)
    {
        try {
            $blogPost->delete();

            return redirect()->route('blog-posts.index')->with('success', 'Blog post deleted successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->is_active == "true") {
                $status = 1;
            } else {
                $status = 0;
            }

            BlogPostFacade::updateBlogPostStatus($status, $id);

            return response()->json(['message' => 'Status updated successfully']);
        }
    }
}
