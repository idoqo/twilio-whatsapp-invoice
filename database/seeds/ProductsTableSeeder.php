<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        DB::table("products")->insert([
            [
                'name' => $faker->text(15),
                'image_path' => $faker->image('public/images',
                    640,480,null, false),
                'description' => $faker->word,
                'price' =>  $faker->numberBetween(400, 600)
            ],
            [
                'name' => $faker->text(15),
                'image_path' => $faker->image('public/images',
                    640,480,null, false),
                'description' => $faker->word,
                'price' =>  $faker->numberBetween(400, 600)
            ],
        ]);
    }
}
