<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@myfitness.ae'],
            [
                'name'              => 'Super Admin',
                'password'          => Hash::make('12345678'),
                'email_verified_at' => now(),
                'role'              => 'admin',
            ]
        );

        $this->call([
            SiteSettingSeeder::class,
            FaqSeeder::class,
            AreaSeeder::class,
        ]);
    }
}
