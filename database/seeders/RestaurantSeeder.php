<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'name' => "CRAFTEDHUB",
            'address' => 'via italia 10',
            'phone' => '+39 333 333 3333',
            'email' => 'support@craftedhub.it',
            'description' => "Celebra i sapori tradizionali rivisitati con un tocco innovativo, soddisfacendo ogni palato, anche quello dei clienti vegetariani e vegani. L'ambiente elegante e accogliente è perfetto per ogni occasione, dal pranzo informale alla cena speciale. Il nostro servizio attento e professionale completa un'esperienza gastronomica indimenticabile",
            'image_name' => null,
            'image_path' => 'restaurants/test.svg',
            'menu' => 'restaurants/menu.pdf',
            'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7631615.1604297245!2d7.429268919299029!3d41.17824306888591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItalia!5e1!3m2!1sit!2sit!4v1736898889515!5m2!1sit!2sit',
        ]);
    }
}
