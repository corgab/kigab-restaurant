<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('package')->insert([
            [
                'name' => 'Base',
                'description' => $faker->sentence,
                'features' => json_encode(['Visualizzazione del menu', 'Gestione ordini di base']),
                'activated_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium',
                'description' => $faker->sentence,
                'features' => json_encode(['Visualizzazione del menu', 'Gestione ordini di base', 'Spedizioni online', 'Newsletter']),
                'activated_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



