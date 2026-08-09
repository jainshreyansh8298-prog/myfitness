<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'color' => 'nullable|string|max:7',
        ]);

        $data = $request->only(['name','description', 'color']);

        $slug = Str::slug($request->name);

        if(Category::where('slug', $slug)->exists()){
            return back()->withErrors(['name' => 'The category name has already been taken.'])->withInput();
        }

        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        }

        Category::create($data);

        return redirect()->route('admins.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        $category->loadCount('services');
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'color' => 'nullable|string|max:7',
        ]);

        $data = $request->only(['name', 'description', 'color']);

        $slug = Str::slug($request->name);

        if(Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()){
            return back()->withErrors(['name' => 'The category name has already been taken.'])->withInput();
        }

        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        }else {
            $data['image'] = $category->image;
        }

        $category->update($data);

        return redirect()->route('admins.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image){
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('admins.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
