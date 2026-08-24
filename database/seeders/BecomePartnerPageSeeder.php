<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class BecomePartnerPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'become-partner'],
            [
                'title' => 'Become a Partner', 
                'content' => "<p>Are you a passionate fitness trainer or fitness professional looking to make a meaningful impact on people's lives? Join our team at My Fitness and connect with clients who are looking for personalized training that suits their unique needs. Fill out the form below with your details and take the first step towards a successful career in the fitness industry.</p>"
            ]
        );
    }
}
