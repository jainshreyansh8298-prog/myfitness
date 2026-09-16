<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        Career::create([
            'title'       => 'Personal Trainer',
            'location'    => 'Dubai, UAE',
            'type'        => 'Full-time',
            'description' => 'We are looking for an experienced and passionate Personal Trainer to join our team. You will be responsible for creating customized fitness programs, guiding clients through workouts, and motivating them to achieve their health and fitness goals. A relevant certification and at least 2 years of experience are required.',
            'is_active'   => true,
            'sort_order'  => 1,
        ]);
    }
}
