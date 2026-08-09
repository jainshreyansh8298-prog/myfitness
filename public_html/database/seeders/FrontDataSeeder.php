<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Categories
        $categories = [
            [
                'name' => 'Strength & Conditioning',
                'slug' => 'strength-conditioning',
                'description' => 'Build strength and improve your overall fitness.',
                'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop',
                'color' => '#ef4444', // Red
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yoga & Flexibility',
                'slug' => 'yoga-flexibility',
                'description' => 'Improve flexibility, balance, and mental clarity.',
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=1520&auto=format&fit=crop',
                'color' => '#10b981', // Emerald
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HIIT & Cardio',
                'slug' => 'hiit-cardio',
                'description' => 'High-intensity interval training for maximum calorie burn.',
                'image' => 'https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?q=80&w=1470&auto=format&fit=crop',
                'color' => '#0ea5e9', // Sky Blue
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Boxing & Martial Arts',
                'slug' => 'boxing-martial-arts',
                'description' => 'Learn combat skills while getting in the best shape of your life.',
                'image' => 'https://images.unsplash.com/photo-1599058917212-d750089bc07e?q=80&w=1469&auto=format&fit=crop',
                'color' => '#f59e0b', // Amber
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insertOrIgnore($categories);

        // Get category IDs
        $cat1 = DB::table('categories')->where('slug', 'strength-conditioning')->value('id') ?? 1;
        $cat2 = DB::table('categories')->where('slug', 'yoga-flexibility')->value('id') ?? 2;
        $cat3 = DB::table('categories')->where('slug', 'hiit-cardio')->value('id') ?? 3;

        // 2. Services
        $services = [
            [
                'category_id' => $cat1,
                'name' => 'Personal Training 1-on-1',
                'slug' => 'personal-training-1-on-1',
                'description' => 'Personalized workout plans designed specifically for your goals.',
                'price_after' => 200,
                'discount_percentage' => 20,
                'badge_text' => 'Popular',
                'price_before' => 250,
                'is_featured' => 1,
                'session_minutes' => 60,
                'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=1470&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $cat3,
                'name' => 'Group HIIT Session',
                'slug' => 'group-hiit-session',
                'description' => 'Join our high energy group classes to push your limits.',
                'price_after' => 100,
                'discount_percentage' => null,
                'badge_text' => null,
                'price_before' => 120,
                'is_featured' => 1,
                'session_minutes' => 45,
                'image' => 'https://images.unsplash.com/photo-1552674605-db6ffd4facb5?q=80&w=1470&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $cat2,
                'name' => 'Private Yoga Instructor',
                'slug' => 'private-yoga-instructor',
                'description' => 'Master your mind and body with a dedicated private yoga session.',
                'price_after' => 150,
                'discount_percentage' => 25,
                'badge_text' => 'New',
                'price_before' => 200,
                'is_featured' => 1,
                'session_minutes' => 60,
                'image' => 'https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?q=80&w=1470&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('services')->insertOrIgnore($services);

        // 3. Blogs
        $blogs = [
            [
                'title' => 'The Ultimate Guide to Muscle Recovery',
                'slug' => 'ultimate-guide-muscle-recovery',
                'excerpt' => 'Discover the best practices for recovering faster after an intense workout session.',
                'content' => '<p>Recovery is just as important as the workout itself. Make sure to sleep 8 hours, stay hydrated, and stretch properly.</p>',
                'category_id' => $cat1,
                'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=1470&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Top 5 Benefits of Morning Workouts',
                'slug' => 'top-5-benefits-morning-workouts',
                'excerpt' => 'Why waking up early to sweat might be the secret to a highly productive day.',
                'content' => '<p>Morning workouts can boost your metabolism and set a positive tone for the rest of your day.</p>',
                'category_id' => $cat3,
                'image' => 'https://images.unsplash.com/photo-1538805060514-97d9cc17730c?q=80&w=1469&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How to Start Your Fitness Journey at Home',
                'slug' => 'start-fitness-journey-at-home',
                'excerpt' => 'You don\'t need a gym to get fit. Here is how you can start training in your living room.',
                'content' => '<p>With just a few basic pieces of equipment like dumbbells and a yoga mat, you can achieve incredible results at home.</p>',
                'category_id' => $cat2,
                'image' => 'https://images.unsplash.com/photo-1598266663412-2c67676fb313?q=80&w=1470&auto=format&fit=crop',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('blogs')->insertOrIgnore($blogs);
    }
}
