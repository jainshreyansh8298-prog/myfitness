<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Generator;

class GeneralSettingController extends Controller
{
    public function switchLanguage(Request $request)
    {
        $request->validate(['locale' => 'required|in:en,ar']);
        App::setLocale($request->locale);
        Session::put('locale', $request->locale);
        return redirect()->back();
    }

    public function edit()
    {
        $settings = GeneralSetting::pluck('value', 'key');

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|max:5120',
        ]);

        $logo_row = GeneralSetting::where('key', 'logo')->first();

        $logo_path = $logo_row->value ?? ''; // Default to current value

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_path = $logo->store('settings', 'public');

            // Delete old file if exists
            if (!empty($logo_row->value)) {
                Controller::deleteFile($logo_row->value);
            }
        }

        if ($logo_row) {
            $logo_row->value = $logo_path;
            $logo_row->save();
        } else {
            GeneralSetting::create([
                'key'   => 'logo',
                'value' => $logo_path,
            ]);
        }

        return redirect()->route('dashboard')
            ->with('success', __('General Setting Updated Successfully'));
    }
}
