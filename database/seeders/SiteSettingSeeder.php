<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            'brand_name'            => 'My Fitness',
            'primary_color'         => '#dfff00', // Cult.fit energetic neon yellow/lime
            'secondary_color'       => '#00f2fe', // Electric cyan accent
            'bg_color'              => '#0b0d14', // Sleek cult.fit dark mode
            'text_color'            => '#ffffff',
            
            // Hero Video Background
            'hero_video_url'        => 'https://assets.mixkit.co/videos/preview/mixkit-man-runs-on-a-treadmill-in-a-gym-41315-large.mp4',
            'hero_title'            => 'ELEVATE YOUR FITNESS JOURNEY WITH EXPERT PERSONAL TRAINERS',
            'hero_subtitle'         => 'Certified trainers at your home, gym, or pool across Dubai & UAE. Flexible scheduling, customized workout plans, and guaranteed transformation.',

            // Moving Announcement Ticker
            'show_ticker'           => '1',
            'ticker_text'           => '🔥 EXCLUSIVE OFFER: Get 10% OFF your first booking! Code: FIRST10 | ⚡ Free Initial Fitness Consultation | 🏋️ Trained 5,000+ Clients across Dubai & Abu Dhabi',

            // 10% Off Popup Box
            'show_popup'            => '1',
            'popup_headline'        => 'GET 10% OFF YOUR FIRST BOOKING!',
            'popup_subheadline'     => 'Join over 5,000+ fitness enthusiasts. Enter your email below to unlock your exclusive 10% discount promo code.',
            'popup_discount_code'   => 'FIRST10',

            // Homepage Section Toggles
            'show_hero_video'       => '1',
            'show_services'         => '1',
            'show_why_us'           => '1',
            'show_pricing'          => '1',
            'show_testimonials'     => '1',
            'show_blogs'            => '1',
            'show_faqs'             => '1',
        ];

        foreach ($defaults as $key => $val) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // Default Cult.fit style Testimonials
        if (Testimonial::count() === 0) {
            Testimonial::create([
                'name' => 'Sarah Al Mansoori',
                'role_location' => 'Dubai Marina • Lost 12kg in 3 Months',
                'rating' => 5,
                'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150',
                'content' => 'Working with My Fitness trainers completely transformed my routine! The personal trainer comes directly to my apartment building gym. I achieved results faster than 2 years of solo workout.',
                'is_active' => true,
                'sort_order' => 1
            ]);

            Testimonial::create([
                'name' => 'Marcus Vance',
                'role_location' => 'Downtown Dubai • Muscle Building',
                'rating' => 5,
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150',
                'content' => 'Top notch master trainers! The booking process is seamless and the pricing transparency with zero hidden fees makes it the best fitness service in UAE.',
                'is_active' => true,
                'sort_order' => 2
            ]);

            Testimonial::create([
                'name' => 'Elena Rostova',
                'role_location' => 'JBR • Swimming & Boxing',
                'rating' => 5,
                'avatar_url' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=150',
                'content' => 'My kids learned swimming in just 4 weeks with their certified swimming instructor. Highly professional, punctual, and friendly!',
                'is_active' => true,
                'sort_order' => 3
            ]);
        }
    }
}
