<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

/**
 * Forces the site's color settings to the branded WHITE / light theme.
 *
 * Unlike SiteSettingSeeder (which uses firstOrCreate and never overwrites
 * existing values), this uses SiteSetting::set() to overwrite whatever colors
 * are currently saved. Run with:
 *   php artisan db:seed --class=WhiteThemeSeeder --force
 */
class WhiteThemeSeeder extends Seeder
{
    public function run(): void
    {
        $white = [
            'primary_color'        => '#4DBFAA', // Teal from company logo
            'secondary_color'      => '#5ECC7E', // Green from company logo
            'bg_color'             => '#ffffff', // Clean white background
            'text_color'           => '#1a1a2e', // Dark text for readability
            'button_text_color'    => '#ffffff', // White text on colored buttons

            'card_color'           => '#f4f4f5',
            'card_hover_color'     => '#e4e4e7',
            'btn_bg_color'         => '#1a1a2e',
            'btn_hover_color'      => '#4DBFAA',
            'btn_hover_text_color' => '#ffffff',
            'testimonial_color'    => '#f4f4f5',
            'hero_title_color'     => '#000000',
            'hero_sub_color'       => '#333333',
            'footer_icon_color'    => '#4DBFAA',
            'stats_number_color'   => '#4DBFAA',
        ];

        foreach ($white as $key => $val) {
            SiteSetting::set($key, $val);
        }
    }
}
