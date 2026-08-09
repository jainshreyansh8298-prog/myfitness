<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('sort_order', 'asc')->latest()->paginate(15);
        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Announcement::create($this->resolveSchedule($request, $data));

        return redirect()->route('admins.announcements.index')
            ->with('success', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $data = $this->validated($request);
        $announcement->update($this->resolveSchedule($request, $data));

        return redirect()->route('admins.announcements.index')
            ->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admins.announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'message'    => 'required|string|max:500',
            'link'       => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
            'duration'   => 'required|in:permanent,days',
            'days'       => 'nullable|integer|min:1|max:3650',
        ]);
    }

    /**
     * Translate the "permanent vs N days" choice into concrete columns.
     */
    private function resolveSchedule(Request $request, array $data): array
    {
        $isPermanent = ($data['duration'] ?? 'permanent') === 'permanent';

        return [
            'message'      => $data['message'],
            'link'         => $data['link'] ?? null,
            'sort_order'   => $data['sort_order'] ?? 0,
            'is_active'    => $request->boolean('is_active'),
            'is_permanent' => $isPermanent,
            'expires_at'   => $isPermanent ? null : now()->addDays((int) ($data['days'] ?? 7)),
        ];
    }
}
