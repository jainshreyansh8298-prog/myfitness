<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order', 'asc')->latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'avatar' => 'nullable|image|max:5120',
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('testimonials', 'public');
            $data['avatar_url'] = \Illuminate\Support\Facades\Storage::url($path);
        }

        Testimonial::create($data);

        return redirect()->route('admins.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'avatar' => 'nullable|image|max:5120',
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            $oldAvatar = $testimonial->avatar_url;
            $path = $request->file('avatar')->store('testimonials', 'public');
            $data['avatar_url'] = \Illuminate\Support\Facades\Storage::url($path);

            if ($oldAvatar && \Illuminate\Support\Str::startsWith($oldAvatar, '/storage/')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('/storage/', '', $oldAvatar));
            }
        }

        $testimonial->update($data);

        return redirect()->route('admins.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admins.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
