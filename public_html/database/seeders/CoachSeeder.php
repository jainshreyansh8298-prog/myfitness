<?php

namespace Database\Seeders;

use App\Models\Coach;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    public function run(): void
    {
        $coaches = [
            [
                'name'      => 'Sarah Johnson',
                'title'     => 'Head Personal Trainer',
                'bio'       => 'NASM-certified trainer with 10+ years transforming clients across Dubai. Specializes in strength and fat loss.',
                'instagram' => 'https://instagram.com',
                'sort_order' => 1,
            ],
            [
                'name'      => 'Ahmed Al Mansoori',
                'title'     => 'Strength & Conditioning Coach',
                'bio'       => 'Former national athlete helping clients build power, mobility and lasting habits.',
                'sort_order' => 2,
            ],
            [
                'name'      => 'Elena Petrova',
                'title'     => 'Yoga & Mobility Specialist',
                'bio'       => 'RYT-500 yoga instructor focused on flexibility, breathwork and recovery.',
                'sort_order' => 3,
            ],
            [
                'name'      => 'David Chen',
                'title'     => 'Nutrition & Wellness Coach',
                'bio'       => 'Precision-nutrition coach crafting sustainable meal plans for real results.',
                'sort_order' => 4,
            ],
        ];

        foreach ($coaches as $coach) {
            Coach::firstOrCreate(
                ['name' => $coach['name']],
                array_merge($coach, ['is_active' => true])
            );
        }
    }
}
