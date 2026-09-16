<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('sort_order')->get();
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'nullable|string|max:255',
            'type'        => 'required|string|max:100',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        Career::create([
            'title'       => $request->title,
            'location'    => $request->location,
            'type'        => $request->type,
            'description' => $request->description,
            'is_active'   => $request->has('is_active'),
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admins.careers.index')->with('success', 'Career created successfully.');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'nullable|string|max:255',
            'type'        => 'required|string|max:100',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        $career->update([
            'title'       => $request->title,
            'location'    => $request->location,
            'type'        => $request->type,
            'description' => $request->description,
            'is_active'   => $request->has('is_active'),
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admins.careers.index')->with('success', 'Career updated successfully.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admins.careers.index')->with('success', 'Career deleted successfully.');
    }
}
