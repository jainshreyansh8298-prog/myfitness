<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name' => 'Sarah J.',
                'role_location' => 'Dubai Marina',
                'rating' => 5,
                'avatar_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150',
                'transformation_image' => null,
                'content' => 'My Fitness changed my life! The trainers are incredibly knowledgeable and the convenience of having them come to my home makes all the difference in my busy schedule. I have lost 15kg in just 3 months!',
                'is_active' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael T.',
                'role_location' => 'Downtown Dubai',
                'rating' => 5,
                'avatar_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150',
                'transformation_image' => null,
                'content' => 'The premium quality of the equipment and the professionalism of the coaches are unmatched. I recommend My Fitness to anyone serious about their health. Their transparent pricing was a breath of fresh air.',
                'is_active' => true,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aisha K.',
                'role_location' => 'Palm Jumeirah',
                'rating' => 5,
                'avatar_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150',
                'transformation_image' => null,
                'content' => 'I love the flexible scheduling. Booking a session after work is so easy. The trainers are always punctual and push me exactly how much I need to be pushed. Simply the best fitness service in Dubai.',
                'is_active' => true,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('testimonials')->insert($testimonials);
    }
}
