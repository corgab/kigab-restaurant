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
            'name' => 'restaurant name',
            'address' => 'via lorem 10',
            'phone' => '+39 333 333 3333',
            'email' => 'restaurant@test.it',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ipsum voluptatem dicta sit, unde voluptatum quasi cumque, iure quis tenetur commodi autem, quo voluptate aliquid explicabo amet aliquam nihil aspernatur.',
            'image_name' => null,
            'image_path' => 'restaurants/test.svg'
        ]);
    }
}
