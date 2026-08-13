<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'                 => 'required|string|max:255',
            'excerpt'                => 'nullable|string|max:255',
            'content'               => 'required|string',
            'category_id'           => 'required|exists:categories,id',
            'image'                 => 'required|image|max:5120',
        ]);

        $slug = Str::slug($request->title);

        if (Blog::where('slug', $slug)->exists()) {
            return redirect()->back()
                ->withInput()->with('error', 'title already exists');
        }

        $excerpt = $request->excerpt ?? Str::excerpt(strip_tags($request->content));

        $image_path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('blogs', 'public');
        }

        Blog::create([
            'title'             => $request->title,
            'slug'              => $slug,
            'excerpt'           => $excerpt,
            'category_id'       => $request->category_id,
            'content'           => $request->content,
            'image'             => $image_path,
        ]);

        \Illuminate\Support\Facades\Cache::forget('home_recent_blogs');

        return redirect()->route('admins.blogs.index')
            ->with('success', 'Blog Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'                 => 'required|string|max:255',
            'excerpt'                => 'nullable|string|max:255',
            'content'               => 'required|string',
            'category_id'           => 'required|exists:categories,id',
            'image'                 => 'nullable|image|max:5120',
        ]);

        $slug = Str::slug($request->title);

        if (Blog::where('slug', $slug)->where('id', '<>', $blog->id)->exists()) {
            return redirect()->back()
                ->withInput()->with('error', 'title already exists');
        }

        $excerpt = $request->excerpt ?? Str::excerpt(strip_tags($request->content));

        $image_path = $blog->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('blogs', 'public');
            if ($blog->image) {
                Controller::deleteFile($blog->image);
            }
        }

        $blog->update([
            'title'             => $request->title,
            'slug'              => $slug,
            'excerpt'           => $excerpt,
            'category_id'       => $request->category_id,
            'content'           => $request->content,
            'image'             => $image_path,
        ]);

        \Illuminate\Support\Facades\Cache::forget('home_recent_blogs');

        return redirect()->route('admins.blogs.index')
            ->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Controller::deleteFile($blog->image);
        }

        $blog->delete();

        \Illuminate\Support\Facades\Cache::forget('home_recent_blogs');

        return redirect()->route('admins.blogs.index')
            ->with('success', 'Blog Deleted Successfully');
    }
}
