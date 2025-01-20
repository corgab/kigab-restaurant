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
                'title' => 'Benvenuto',
                'content' => "Benvenuti al nostro ristorante. Godetevi un'esperienza culinaria memorabile con i nostri deliziosi piatti e l'atmosfera accogliente.",
                'image' => 'public/sections/hero.png',
            ],
            [
                'slug' => 'about us',
                'title' => 'Chi siamo',
                'content' => "Scopri di più sulla nostra storia, sui nostri valori e sul nostro impegno nel fornire ingredienti freschi e di alta qualità e un servizio eccezionale.",
                'image' => 'public/sections/about-us.jpg',
            ],
            [
                'slug' => 'testimonials',
                'title' => 'Recensioni dei clienti',
                'content' => 'In questa sezione sono presenti le recensioni dei nostri stimati clienti, che condividono le loro esperienze e il loro apprezzamento per il nostro cibo e il nostro servizio.',
                'image' => null,
            ],
            [
                'slug' => 'our menu',
                'title' => 'Esplora il nostro menu',
                'content' => 'Scarica il nostro menù completo in formato PDF e scopri la varietà dei piatti che proponiamo, dagli antipasti ai dessert.',
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
