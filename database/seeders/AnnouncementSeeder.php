<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        Announcement::firstOrCreate(
            ['message' => '🎉 New Year Offer: 20% OFF all personal training packages! Book now.'],
            [
                'is_active'    => true,
                'is_permanent' => true,
                'sort_order'   => 1,
            ]
        );

        Announcement::firstOrCreate(
            ['message' => '🏃 Free trial session for first-time clients — limited slots this month!'],
            [
                'is_active'    => true,
                'is_permanent' => false,
                'expires_at'   => now()->addDays(30),
                'sort_order'   => 2,
            ]
        );
    }
}
