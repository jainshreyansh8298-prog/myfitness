<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('blogs')->truncate();

        $blogs = array (
  0 => 
  array (
    'title' => 'Massage Before or After Workout? What Really Works and Why',
    'slug' => 'massage-before-or-after-workout-what-really-works-and-why',
    'category_id' => 1,
    'image' => 'blogs/wKG5d2rOrmzKHRWbuhNROhRrHdUAOCI26zqIlGzX.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  1 => 
  array (
    'title' => 'What Type of Fitness Training Do You Actually Need? A Breakdown by Lifestyle and Goals',
    'slug' => 'what-type-of-fitness-training-do-you-actually-need-a-breakdown-by-lifestyle-and-goals',
    'category_id' => 1,
    'image' => 'blogs/BdtsVCrG9p97hOk6ADbPJqkToZZF8ZBNGCnslmQE.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  2 => 
  array (
    'title' => 'Deep Tissue Massage and Sports Massage: What’s the Difference?',
    'slug' => 'deep-tissue-massage-and-sports-massage-whats-the-difference',
    'category_id' => 1,
    'image' => 'blogs/VI2NwWf0lmaYP9oxK9xD1cGzleAam5c6ZE1c8oWS.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  3 => 
  array (
    'title' => 'Group Yoga vs Private Sessions: Which One’s Right for You?',
    'slug' => 'group-yoga-vs-private-sessions-which-ones-right-for-you',
    'category_id' => 1,
    'image' => 'blogs/NV8uYaEz7dnXVnbAmfWhpjlrc8XJitZlk2IwXK1y.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  4 => 
  array (
    'title' => 'How Fitness Goals Change With Age & How Your Trainer Should Adapt',
    'slug' => 'how-fitness-goals-change-with-age-how-your-trainer-should-adapt',
    'category_id' => 1,
    'image' => 'blogs/uEYva5asKKcVM3F5jsPz4TfuPzxPCypO35Y5ZrqU.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  5 => 
  array (
    'title' => 'What No One Tells You About Postpartum Recovery and How Pre and Post Natal Massage Helps',
    'slug' => 'what-no-one-tells-you-about-postpartum-recovery-and-how-pre-and-post-natal-massage-helps',
    'category_id' => 1,
    'image' => 'blogs/NRFRAg1Ui34PoSp3UIVPLUW0sOSKBOlJ1Qu6eKmd.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  6 => 
  array (
    'title' => 'How Personal Trainers Help You Push Past Fitness Stagnation',
    'slug' => 'how-personal-trainers-help-you-push-past-fitness-stagnation',
    'category_id' => 1,
    'image' => 'blogs/soG8DzDEIlQLxiV1whNq1xqHmR10XZQka68PmEe3.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  7 => 
  array (
    'title' => 'Why Personalized Yoga Class Is Better Option for You',
    'slug' => 'why-personalized-yoga-class-is-better-option-for-you',
    'category_id' => 1,
    'image' => 'blogs/joxSD5Jl3EzATrVnzWLoOQInZoByyPUPd99v4r2K.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
  8 => 
  array (
    'title' => 'The Ultimate Guide to Marathons & Road Running in the UAE',
    'slug' => 'the-ultimate-guide-to-marathons-road-running-in-the-uae',
    'category_id' => 1,
    'image' => 'blogs/h7kWT6JWCTKNVY4HdfLU9Rhe3WW4Wmy8J0sLwXjq.webp',
    'content' => '',
    'created_at' => '2025-11-23 00:00:00',
    'updated_at' => '2025-11-23 00:00:00',
  ),
);

        DB::table('blogs')->insert($blogs);
    }
}
