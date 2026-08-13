<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::orderBy('sort_order', 'asc')->latest()->paginate(15);
        return view('admin.coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('admin.coaches.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('coaches', 'public');
        }

        Coach::create($data);

        return redirect()->route('admins.coaches.index')
            ->with('success', 'Coach added successfully.');
    }

    public function edit(Coach $coach)
    {
        return view('admin.coaches.edit', compact('coach'));
    }

    public function update(Request $request, Coach $coach)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            if ($coach->photo && !str_starts_with($coach->photo, 'http')) {
                Storage::disk('public')->delete($coach->photo);
            }
            $data['photo'] = $request->file('photo')->store('coaches', 'public');
        }

        $coach->update($data);

        return redirect()->route('admins.coaches.index')
            ->with('success', 'Coach updated successfully.');
    }

    public function destroy(Coach $coach)
    {
        if ($coach->photo && !str_starts_with($coach->photo, 'http')) {
            Storage::disk('public')->delete($coach->photo);
        }
        $coach->delete();

        return redirect()->route('admins.coaches.index')
            ->with('success', 'Coach deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name'       => 'required|string|max:255',
            'title'      => 'nullable|string|max:255',
            'bio'        => 'nullable|string',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'instagram'  => 'nullable|string|max:255',
            'facebook'   => 'nullable|string|max:255',
            'linkedin'   => 'nullable|string|max:255',
            'whatsapp'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);
    }
}
