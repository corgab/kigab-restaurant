<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => 'Chi siamo',
            'slug' => 'chi-siamo',
            'content' => '<p>Questa è la pagina Chi siamo del nostro ristorante.</p>'
        ]);

        Page::create([
            'title' => 'Contatti',
            'slug' => 'contatti',
            'content' => '<p>Contattaci al numero 123-456-7890 o via email a contatto@ristorante.com.</p>'
        ]);
    }
}
