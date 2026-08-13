<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('category')->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                      => 'required|string|max:255',
            'description'               => 'nullable|string',
            'category_id'               => 'required|exists:categories,id',
            'price_after'               => 'required|numeric|min:0',
            'price_before'              => 'nullable|numeric|min:0',
            'badge_text'                => 'nullable|string|max:50',
            'is_featured'               => 'required|boolean',
            'image'                     => 'required|image|max:5120',
            'session_minutes'           => 'required|in:45,60,90',
        ]);

        $slug = Str::slug($request->name);

        if (Service::where('slug', $slug)->exists()) {
            return redirect()->back()->withInput()->with('error', 'Service name already exists');
        }

        $image_path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('services', 'public');
        }

        $priceBefore = $request->price_before ?: ($request->price_after * 1.4);
        $discountPct = ($priceBefore > $request->price_after) ? round((($priceBefore - $request->price_after) / $priceBefore) * 100) : 0;

        Service::create([
            'name'                              => $request->name,
            'description'                       => $request->description,
            'category_id'                       => $request->category_id,
            'slug'                              => $slug,
            'price_after'                       => $request->price_after,
            'price_before'                      => $priceBefore,
            'discount_percentage'               => $discountPct,
            'badge_text'                        => $request->badge_text,
            'is_featured'                       => $request->is_featured,
            'image'                             => $image_path,
            'session_minutes'                   => $request->session_minutes,
        ]);

        return redirect()->route('admins.services.index')
            ->with('success', __('Service Created Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service->load('category');
        return view('admin.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.services.edit', compact('categories', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'                      => 'required|string|max:255',
            'description'               => 'nullable|string',
            'category_id'               => 'required|exists:categories,id',
            'price_after'               => 'required|numeric|min:0',
            'price_before'              => 'nullable|numeric|min:0',
            'badge_text'                => 'nullable|string|max:50',
            'is_featured'               => 'required|boolean',
            'image'                     => 'nullable|image|max:5120',
            'session_minutes'           => 'required|in:45,60,90',
        ]);

        $slug = Str::slug($request->name);

        if (Service::where('slug', $slug)->where('id', '<>', $service->id)->exists()) {
            return redirect()->back()->withInput()->with('error', 'Service name already exists');
        }

        $image_path = $service->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('services', 'public');
            if ($service->image) {
                Controller::deleteFile($service->image);
            }
        }

        $priceBefore = $request->price_before ?: ($request->price_after * 1.4);
        $discountPct = ($priceBefore > $request->price_after) ? round((($priceBefore - $request->price_after) / $priceBefore) * 100) : 0;

        $service->update([
            'name'                              => $request->name,
            'description'                       => $request->description,
            'category_id'                       => $request->category_id,
            'slug'                              => $slug,
            'price_after'                       => $request->price_after,
            'price_before'                      => $priceBefore,
            'discount_percentage'               => $discountPct,
            'badge_text'                        => $request->badge_text,
            'is_featured'                       => $request->is_featured,
            'image'                             => $image_path,
            'session_minutes'                   => $request->session_minutes,
        ]);

        return redirect()->route('admins.services.index')
            ->with('success', __('Service Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            Controller::deleteFile($service->image);
        }

        $service->delete();

        return redirect()->route('admins.services.index')
            ->with('success', __('Service Deleted Successfully'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
        ]);

        $services = Service::with('category')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })->limit(5)
            ->get();

        return $services->map(function ($service) {
            return [
                'id' => $service->id,
                'name' => $service->name,
            ];
        });
    }
}
