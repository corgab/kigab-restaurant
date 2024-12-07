<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Inserisci 10 piatti di esempio
        for ($i = 0; $i < 10; $i++) {
            DB::table('dishes')->insert([
                'name' => $faker->word . ' ' . $faker->word, // Nome del piatto
                'description' => $faker->sentence(15), // Descrizione del piatto
                'price' => $faker->randomFloat(2, 5, 50), // Prezzo del piatto (tra 5 e 50)
                'category' => $faker->randomElement(['Antipasto', 'Primo', 'Secondo', 'Contorno', 'Dessert']), // Categoria
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
