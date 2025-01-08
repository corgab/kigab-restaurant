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
                'title' => 'Sezione Home',
                'content' => 'Questo è il contenuto per la sezione Home.',
                'image' => 'public/sections/test.png',
            ],
            [
                'slug' => 'about us',
                'title' => 'Chi Siamo',
                'content' => 'Scopri di più su di noi in questa sezione.',
                'image' => 'public/sections/test.png',
            ],
            [
                'slug' => 'testimonials',
                'title' => 'Recensioni',
                'content' => 'Questa sezione raccoglie tutte le recensioni dei nostri clienti, che riflettono la loro esperienza con noi e la qualità del nostro cibo e servizio.',
                'image' => null,
            ],
            [
                'slug' => 'our menu',
                'title' => 'Sfoglia il nostro menu',
                'content' => 'Scarica il nostro menu completo in formato PDF.',
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
