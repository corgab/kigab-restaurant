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
                'title' => 'First Gallery Image',
                'path' => 'storage/galleries/test.png',
            ],
            [
                'title' => 'Second Gallery Image',
                'path' => 'storage/galleries/test.png',
            ],
            [
                'title' => 'Third Gallery Image',
                'path' => 'storage/galleries/test.png',
            ],
        ];

        foreach($galleries as $gallery) {
            Gallery::create([
                'title' => $gallery['title'],
                'path' => $gallery['path'],
            ]);
        }

    }
}
