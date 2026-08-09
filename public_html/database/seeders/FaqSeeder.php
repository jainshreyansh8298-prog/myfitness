<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::truncate();

        $faqs = [
            [
                'question' => 'Why choose My Fitness?',
                'answer' => 'At My Fitness, we believe that fitness should be accessible to everyone. That\'s why we offer a range of products and services designed to fit any budget and lifestyle. Our team of friendly and knowledgeable experts is here to support you every step of the way, whether you\'re looking to lose weight, build muscle, or just feel better in your own skin.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Where can I train?',
                'answer' => 'At My Fitness, you can select the place of training according to your own requirements and convenience, whether it\'s at your home, at the fitness center, or online.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'What are the prices?',
                'answer' => 'The prices depend on the service you choose, and they vary according to the place you choose to train in. You can visit our services page to see the prices for our services.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'How can I know my trainers details?',
                'answer' => 'We will assign you a highly rated and best available trainer who will help you with your fitness needs. Once you get comfortable with the trainer, you can book the same trainer subject to availability.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Do I need a gym or any studio membership?',
                'answer' => 'No, you don’t need a gym or studio membership.<br>My Fitness brings the workout, yoga, massage session, or any of our services directly to you—whether it\'s at your home, office, or a preferred location. All our services are designed to be done without the need for any external memberships. Our professionals come fully equipped with everything needed for your session.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'What should I prepare for my personal training?',
                'answer' => 'Make sure you have scheduled your time properly so that you are on time and can enjoy the full session. Wear comfortable clothes, bring a bottle of water, an exercise mat, and definitely a smile.',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'How can I book the same trainer again?',
                'answer' => 'You can reach out to us via WhatsApp or email with the trainer\'s full name. We will get back to you with the trainer\'s available schedule.',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Do I need any special equipment?',
                'answer' => 'No, you don\'t need any special equipment. Just bring your comfortable sports clothes, a bottle of water, an exercise mat, and a smile.',
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
