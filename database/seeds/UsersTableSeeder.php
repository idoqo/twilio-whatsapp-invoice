<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table("users")->insert([
            [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'phone_number' =>  $faker->e164PhoneNumber, // use a real phone number to see this work
                'password' => Hash::make($faker->password()),
            ],
            [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'phone_number' =>  $faker->e164PhoneNumber, // use a real phone number to see this work
                'password' => Hash::make($faker->password()),
            ],
        ]);
    }
}
