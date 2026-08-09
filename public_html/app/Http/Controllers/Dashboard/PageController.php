<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'content' => 'nullable|string',
        ]);

        $page->update([
            'content' => $request->content,
        ]);

        return redirect()->route('admins.pages.index')->with('success', 'Page updated successfully.');
    }

    public function history(Page $page)
    {
        $histories = $page->histories()->latest()->get();
        return view('admin.pages.history', compact('page', 'histories'));
    }
}
