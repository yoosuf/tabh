<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::statement('TRUNCATE users CASCADE');


        for ($i=0; $i < 100; $i++) {
            $user  = \App\Entities\User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
            ]);


            $address = [
                'first_name' => $user->firstName,
                'last_name' => $user->lastName,
                'phone' => $faker->phoneNumber,
                'address1' => $faker->streetName,
                'address2' => $faker->streetAddress,
                'city' => $faker->city,
                'province' => $faker->streetAddress,
                'postcode' => $faker->postcode,
                'country' => $faker->country,
                'default' => 1,
            ];

            $user->addresses()->create($address);



        }

    }
}
