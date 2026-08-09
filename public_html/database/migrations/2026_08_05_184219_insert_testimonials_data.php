<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Clear any existing testimonials to ensure a clean state
        DB::table('testimonials')->truncate();

        $testimonials = [
            [
                'name' => 'Ahmed Elmahdy',
                'role_location' => 'Runner',
                'content' => 'The platform is incredibly user-friendly and made it easy to connect with personal trainers who truly understand my goals. Highly recommend it to anyone looking to elevate their fitness journey.',
                'rating' => 5,
                'is_active' => 1,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jennie Wong',
                'role_location' => 'Flight Attendant',
                'content' => 'I was able to book yoga sessions that were tailored to my availability. The platform offers a variety of yoga styles and levels, so I could choose what suited me best. The instructor was incredibly knowledgeable and attentive, ensuring that I got the most out of each session. The convenience of having sessions at my preferred times made a huge difference in maintaining a consistent practice.',
                'rating' => 5,
                'is_active' => 1,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nancy',
                'role_location' => 'Interior Designer',
                'content' => 'I have been training at My Fitness since 2 months. Throughout this time, my strength and overall fitness have significantly improved compared to any previous point in my life. Each class and trainer at My Fitness offers unique experience, always pushing me to my limits and providing a super challenging workout. The diverse range of exercises and training styles keeps me engaged and motivated to consistently show up and give my all.',
                'rating' => 5,
                'is_active' => 1,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stephanie',
                'role_location' => 'Teacher',
                'content' => 'I started My Fitness remote coaching over 2 months ago. I have lost some weight, gotten on a healthy exercise and meal schedule and feel great about myself. The workouts kick your butt. I love that I can see how I’m increasing my endurance by being able to do workout online at my scheduled time.',
                'rating' => 5,
                'is_active' => 1,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luciana',
                'role_location' => 'Doctor',
                'content' => 'My Fitness is associated with exceptionally clean and well-organized studios. Domenic creates an environment where you feel incredibly comfortable, while Kaitlyn provides invaluable guidance for maintaining a healthy and nutritious diet. The team at My Fitness embodies excellence in every aspect. They cater to individuals of all backgrounds and fitness levels, offering customized plans to suit any goal. The flexibility they provide is truly remarkable. I am extremely satisfied with My Fitness and deeply grateful for the entire team\'s dedication and support.',
                'rating' => 5,
                'is_active' => 1,
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('testimonials')->insert($testimonials);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('testimonials')->truncate();
    }
};
