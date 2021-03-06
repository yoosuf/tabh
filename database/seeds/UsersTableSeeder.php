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
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => \Illuminate\Support\Facades\Hash::make( 'password' ),
            ]);


            $address = [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'address1' => $faker->streetName,
                'address2' => $faker->streetAddress,
                'area' => $faker->city,
                'district' => $faker->streetAddress,
                'postcode' => $faker->postcode,
                'country' => $faker->country,
                'default' => 1,
            ];

            $user->addresses()->create($address);



        }

    }
}
