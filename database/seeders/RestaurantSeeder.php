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
            'image_path' => 'restaurants/test.svg',
            'menu' => 'restaurants/menu.pdf',
            'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d885.6832880667713!2d10.794641706841702!3d44.309862903916645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132aa52de06020eb%3A0xa878b7ce3922767f!2sVia%20Camatta%2C%201%2C%2041026%20Camatta%20MO!5e1!3m2!1sit!2sit!4v1736481754195!5m2!1sit!2sit',
        ]);
    }
}
