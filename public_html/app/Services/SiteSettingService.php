<?php

namespace App\Services;

use App\Models\SiteSetting;

class SiteSettingService
{
    /**
     * Get all site settings with default values.
     *
     * @return array
     */
    public function getAllSettings(): array
    {
        $heroSlidesRaw = SiteSetting::get('hero_slides', json_encode([
            ['type' => 'video', 'url' => 'https://assets.mixkit.co/videos/preview/mixkit-man-runs-on-a-treadmill-in-a-gym-41315-large.mp4']
        ]));

        return [
            'brand_name'          => SiteSetting::get('brand_name', 'My Fitness'),
            'primary_color'       => SiteSetting::get('primary_color', '#dfff00'),
            'secondary_color'     => SiteSetting::get('secondary_color', '#00f2fe'),
            'bg_color'            => SiteSetting::get('bg_color', '#0b0d14'),
            'text_color'          => SiteSetting::get('text_color', '#fafafa'),
            'button_text_color'   => SiteSetting::get('button_text_color', '#000000'),
            'preloader_color'     => SiteSetting::get('preloader_color', '#10b981'),
            'preloader_text'      => SiteSetting::get('preloader_text', 'myfitness.ae'),
            
            'hero_slides'         => json_decode($heroSlidesRaw, true),
            'hero_fade_effect'    => SiteSetting::get('hero_fade_effect', '1'),
            
            'hero_title'          => SiteSetting::get('hero_title', 'ELEVATE YOUR FITNESS JOURNEY WITH EXPERT PERSONAL TRAINERS'),
            'hero_subtitle'       => SiteSetting::get('hero_subtitle', 'Certified trainers at your home, gym, or pool across Dubai & UAE. Flexible scheduling & guaranteed transformation.'),

            'show_ticker'         => SiteSetting::get('show_ticker', '1'),
            'ticker_text'         => SiteSetting::get('ticker_text', '🔥 EXCLUSIVE OFFER: Get 10% OFF your first booking! Code: FIRST10'),

            'show_popup'          => SiteSetting::get('show_popup', '1'),
            'popup_trigger_type'  => SiteSetting::get('popup_trigger_type', 'time'),
            'popup_trigger_value' => SiteSetting::get('popup_trigger_value', '1.5'),
            'popup_headline'      => SiteSetting::get('popup_headline', 'GET 10% OFF YOUR FIRST BOOKING!'),
            'popup_subheadline'   => SiteSetting::get('popup_subheadline', 'Enter your email below to unlock your exclusive 10% discount promo code.'),
            'popup_discount_code' => SiteSetting::get('popup_discount_code', 'FIRST10'),

            'show_hero_video'     => SiteSetting::get('show_hero_video', '1'),
            'show_services'       => SiteSetting::get('show_services', '1'),
            'show_why_us'         => SiteSetting::get('show_why_us', '1'),
            'show_pricing'        => SiteSetting::get('show_pricing', '1'),
            'show_testimonials'   => SiteSetting::get('show_testimonials', '1'),
            'show_blogs'          => SiteSetting::get('show_blogs', '1'),
            'show_faqs'           => SiteSetting::get('show_faqs', '1'),

            'social_instagram'    => SiteSetting::get('social_instagram', ''),
            'show_instagram'      => SiteSetting::get('show_instagram', '0'),
            'social_twitter'      => SiteSetting::get('social_twitter', ''),
            'show_twitter'        => SiteSetting::get('show_twitter', '0'),
            'social_linkedin'     => SiteSetting::get('social_linkedin', ''),
            'show_linkedin'       => SiteSetting::get('show_linkedin', '0'),
            'social_whatsapp'     => SiteSetting::get('social_whatsapp', 'https://wa.me/971585858348'),
            'show_whatsapp'       => SiteSetting::get('show_whatsapp', '1'),
        ];
    }

    /**
     * Get specific hero component settings.
     *
     * @return array
     */
    public function getHeroSettings(): array
    {
        $settings = $this->getAllSettings();
        
        return [
            'showHero'       => $settings['show_hero_video'],
            'heroSlides'     => $settings['hero_slides'],
            'heroFadeEffect' => $settings['hero_fade_effect'],
            'heroTitle'      => $settings['hero_title'],
            'heroSubtitle'   => $settings['hero_subtitle'],
        ];
    }
}
