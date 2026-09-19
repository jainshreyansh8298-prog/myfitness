<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Services\SiteSettingService;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    protected $siteSettingService;

    public function __construct(SiteSettingService $siteSettingService)
    {
        $this->siteSettingService = $siteSettingService;
    }
    public function index()
    {
        $settings = $this->siteSettingService->getAllSettings();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Checkboxes defaults for switches
        $switches = [
            'hero_fade_effect', 'show_announcements', 'show_ticker', 'show_popup', 'show_hero_video',
            'show_services', 'show_why_us', 'show_pricing', 'show_testimonials',
            'show_blogs', 'show_faqs', 'show_coaches', 'show_instagram', 'show_twitter',
            'show_linkedin', 'show_whatsapp'
        ];
        foreach ($switches as $sw) {
            if (!isset($data[$sw])) {
                $data[$sw] = '0';
            }
        }

        // Logo upload (Branding tab). Keep the existing logo if no new file is provided.
        unset($data['site_logo']);
        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            if ($file->isValid()) {
                $oldLogo = SiteSetting::get('site_logo');
                $path = $file->store('branding', 'public');
                $data['site_logo'] = \Illuminate\Support\Facades\Storage::url($path);

                if ($oldLogo && \Illuminate\Support\Str::startsWith($oldLogo, '/storage/')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('/storage/', '', $oldLogo));
                }
            }
        }

        // Login background image upload (Pages tab).
        unset($data['login_bg_image']);
        if ($request->hasFile('login_bg_image')) {
            $file = $request->file('login_bg_image');
            if ($file->isValid()) {
                $oldBg = SiteSetting::get('login_bg_image');
                $path = $file->store('backgrounds', 'public');
                $data['login_bg_image'] = \Illuminate\Support\Facades\Storage::url($path);

                if ($oldBg && \Illuminate\Support\Str::startsWith($oldBg, '/storage/')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('/storage/', '', $oldBg));
                }
            }
        }

        // Partner banner background image upload
        unset($data['partner_banner_bg_image']);
        if ($request->hasFile('partner_banner_bg_image')) {
            $file = $request->file('partner_banner_bg_image');
            if ($file->isValid()) {
                $oldBg = SiteSetting::get('partner_banner_bg_image');
                $path = $file->store('backgrounds', 'public');
                $data['partner_banner_bg_image'] = \Illuminate\Support\Facades\Storage::url($path);

                if ($oldBg && \Illuminate\Support\Str::startsWith($oldBg, '/storage/')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('/storage/', '', $oldBg));
                }
            }
        }

        $heroSlides = $data['hero_slides'] ?? [];
        if (is_array($heroSlides)) {
            $validSlides = [];
            foreach ($heroSlides as $index => $slide) {
                if ($request->hasFile("hero_slides.{$index}.file")) {
                    $file = $request->file("hero_slides.{$index}.file");
                    if ($file->isValid()) {
                        $path = $file->store('hero_slides', 'public');
                        $slide['url'] = \Illuminate\Support\Facades\Storage::url($path);
                    }
                }
                
                unset($slide['file']);
                
                if (!empty($slide['url'])) {
                    $validSlides[] = $slide;
                }
            }
            
            if (empty($validSlides)) {
                // Default fallback if they deleted everything
                $validSlides[] = [
                    'type' => 'video',
                    'url'  => 'https://assets.mixkit.co/videos/preview/mixkit-man-runs-on-a-treadmill-in-a-gym-41315-large.mp4'
                ];
            }
            
            // Delete orphaned files
            $oldSlidesRaw = \App\Models\SiteSetting::get('hero_slides');
            $oldSlides = $oldSlidesRaw ? json_decode($oldSlidesRaw, true) : [];
            $oldUrls = is_array($oldSlides) ? array_column($oldSlides, 'url') : [];
            $newUrls = array_column($validSlides, 'url');
            $deletedUrls = array_diff($oldUrls, $newUrls);
            
            foreach ($deletedUrls as $url) {
                if (\Illuminate\Support\Str::startsWith($url, '/storage/')) {
                    $path = str_replace('/storage/', '', $url);
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($path);
                }
            }
            
            $data['hero_slides'] = json_encode(array_values($validSlides));
        } else {
            $data['hero_slides'] = json_encode([]);
        }

        foreach ($data as $key => $val) {
            SiteSetting::set($key, (string)$val);
        }

        return redirect()->back()->with('success', 'Site settings updated successfully!');
    }
}
