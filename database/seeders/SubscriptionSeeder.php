<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $userIds = DB::table('users')->pluck('id')->toArray(); // Recupera gli ID degli utenti

        for ($i = 0; $i < 10; $i++) {
            DB::table('subscriptions')->insert([
                'user_id' => $faker->randomElement($userIds), // Associa un utente casuale
                'subscribed_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


