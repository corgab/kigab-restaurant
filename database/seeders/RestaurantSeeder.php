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
            'name' => 'Ristorante CRAFTEDHUB',
            'address' => 'via italia 10',
            'phone' => '+39 333 333 3333',
            'email' => 'support@craftedhub.it',
            'description' => "Celebrate traditional flavors revisited with an innovative touch, satisfying every palate, even that of vegetarian and vegan customers. The elegant and welcoming atmosphere is perfect for any occasion, from informal lunch to special dinner. Our attentive and professional service completes an unforgettable gastronomic experience",
            'image_name' => null,
            'image_path' => 'restaurants/test.svg',
            'menu' => 'restaurants/menu.pdf',
            'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7631615.1604297245!2d7.429268919299029!3d41.17824306888591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItalia!5e1!3m2!1sit!2sit!4v1736898889515!5m2!1sit!2sit',
        ]);
    }
}
