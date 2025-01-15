<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use Illuminate\Support\Str;


class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sections = [
            [
                'slug' => 'hero section',
                'title' => 'Welcome',
                'content' => 'Welcome to our restaurant. Enjoy a memorable dining experience with our delicious dishes and welcoming atmosphere.',
                'image' => 'public/sections/hero.png',
            ],
            [
                'slug' => 'about us',
                'title' => 'About Us',
                'content' => 'Learn more about our history, values, and commitment to providing high-quality, fresh ingredients and exceptional service.',
                'image' => 'public/sections/about-us.jpg',
            ],
            [
                'slug' => 'testimonials',
                'title' => 'Customer Reviews',
                'content' => 'This section features reviews from our valued customers, sharing their experiences and appreciation for our food and service.',
                'image' => null,
            ],
            [
                'slug' => 'our menu',
                'title' => 'Explore Our Menu',
                'content' => 'Download our full menu in PDF format and discover the variety of dishes we offer, from appetizers to desserts.',
                'image' => null,
            ]
        ];
        
        
        foreach($sections as $section)
        Section::create([
            'title' => $section['title'],
            'slug' => Str::slug($section['slug'], '-'),
            'content' => $section['content'],
            'image' => $section['image']
        ]);
    }
}
