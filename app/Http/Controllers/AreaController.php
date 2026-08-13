<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::withCount([
            'services'
        ])->get();

        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $services = Service::pluck('id')->toArray();

        $request->validate([
            'name'                      => 'required|string|max:255',
            'description'               => 'nullable|string',
            'image'                     => 'nullable|image|max:5120',
            'services_ids'              => 'required|array',
            'services_ids.*'            => ['required', Rule::in($services)]
        ]);

        $slug = Str::slug($request->name);

        if (Area::where('slug', $slug)->exists()) {
            return redirect()->back()->withInput()
                ->with('error', 'name already exists');
        }

        $image_path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('areas', 'public');
        }

        $area = Area::create([
            'name'          => $request->name,
            'slug'          => $slug,
            'image'         => $image_path,
            'description'   => $request->description,
        ]);

        if ($request->filled('services_ids')) {
            $area->services()->attach($request->services_ids);
        }

        return redirect()->route('admins.areas.index')
            ->with('success', 'Area Created Successfully');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Area $area)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        $area->load('services');

        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $services = Service::pluck('id')->toArray();

        $request->validate([
            'name'                      => 'required|string|max:255',
            'description'               => 'nullable|string',
            'image'                     => 'nullable|image|max:5120',
            'services_ids'              => 'required|array',
            'services_ids.*'            => ['required', Rule::in($services)]
        ]);

        $slug = Str::slug($request->name);

        if (Area::where('slug', $slug)->where('id', '<>', $area->id)->exists()) {
            return redirect()->back()->withInput()
                ->with('error', 'name already exists');
        }

        $image_path = $area->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('areas', 'public');
            if ($area->image) {
                Controller::deleteFile($area->image);
            }
        }

        $area->update([
            'name'          => $request->name,
            'slug'          => $slug,
            'image'         => $image_path,
            'description'   => $request->description,
        ]);

        if ($request->filled('services_ids')) {
            $area->services()->sync($request->services_ids);
        }

        return redirect()->route('admins.areas.index')
            ->with('success', 'Area Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        if ($area->image) {
            Controller::deleteFile($area->image);
        }
        $area->delete();

        return redirect()->route('admins.areas.index')
            ->with('success', 'Area Deleted Successfully');
    }
}
