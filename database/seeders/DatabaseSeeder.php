<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //for social media
        \App\Models\SocialMedia::create([
            'fb' => 'test@example.com',
            'twitter' => 'test@example.com',
            'instagram' => 'test@example.com',
            'linkedin' => 'test@example.com',
        ]);

        //for admins
        \App\Models\Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@admin.com'),
        ]);

        //for admins
        \App\Models\WebSocialLink::create([
            'fb' => 'www.facebook.com',
            'twitter' => 'www.twitter.com',
            'instagram' => 'www.instagram.com',
            'linkedin' => 'www.linkedin.com',
        ]);

       
    }
}
