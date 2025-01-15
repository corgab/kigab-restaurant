<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => '1 Gallery Image',
                'path' => 'storage/galleries/1.jpg',
            ],
            [
                'title' => '2 Gallery Image',
                'path' => 'storage/galleries/2.jpg',
            ],
            [
                'title' => '3 Gallery Image',
                'path' => 'storage/galleries/3.jpg',
            ]

        ];

        foreach($galleries as $gallery) {
            Gallery::create([
                'title' => $gallery['title'],
                'path' => $gallery['path'],
            ]);
        }

    }
}
