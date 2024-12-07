<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Recupera gli ID degli utenti e dei piatti già presenti
        $userIds = DB::table('users')->pluck('id')->toArray();
        $dishIds = DB::table('dishes')->pluck('id')->toArray();

        // Crea 10 ordini di esempio
        for ($i = 0; $i < 10; $i++) {
            $userId = $faker->randomElement($userIds); // Seleziona un utente casuale
            $items = []; // Lista dei piatti ordinati

            // Genera un numero casuale di piatti per l'ordine (tra 1 e 5)
            $numItems = $faker->numberBetween(1, 5);
            for ($j = 0; $j < $numItems; $j++) {
                $dishId = $faker->randomElement($dishIds);
                $items[] = [
                    'dish_id' => $dishId,
                    'quantity' => $faker->numberBetween(1, 3), // Quantità di piatti
                    'price' => DB::table('dishes')->where('id', $dishId)->value('price') // Prezzo del piatto
                ];
            }

            DB::table('orders')->insert([
                'user_id' => $userId,
                'items' => json_encode($items), // Converte l'array in formato JSON
                'total_amount' => array_sum(array_column($items, 'price')), // Calcola il totale degli importi
                'status' => $faker->randomElement(['pending', 'completed', 'cancelled']), // Stato dell'ordine
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


