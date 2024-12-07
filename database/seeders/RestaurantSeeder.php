<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('restaurant')->insert([
            'name' => $faker->company,
            'address' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'postal_code' => $faker->postcode,
            'phone' => $faker->phoneNumber,
            'email' => $faker->unique()->companyEmail,
            'website' => $faker->url,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
