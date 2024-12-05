<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            DB::table('products')->insert([
                'name' => $faker->words(2, true),
                'description' => $faker->sentence(10),
                'price' => $faker->randomFloat(2, 5, 150),
            ]);
        }
    }
}
