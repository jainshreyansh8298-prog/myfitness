<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingContactDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            // Contact Details
            'contact_address'       => 'Dubai, UAE',
            'contact_phone'         => '(+971) 5858 58348',
            'contact_email'         => 'info@myfitness.ae',
        ];

        foreach ($defaults as $key => $val) {
            SiteSetting::firstOrCreate(
                ['key' => $key], ['value' => $val]
            );
        }
    }
}
