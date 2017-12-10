<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $partner = \App\Entities\Partner::firstOrCreate(
            [
                'name' => 'partner from seed',
            ],
            [
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'website' => $faker->domainName,
            ]
        );

//        \App\Entities\Product::truncate();
        DB::statement('TRUNCATE products CASCADE');

        $packsize_array = [
            '50 ml bottle',
            '5 ml vial x 1s pack',
            '12 tablets'
        ];

        for ($i=0; $i < 100; $i++) {
            $partner->products()->create([
                'title' => $faker->word,
                'generic_name' => $faker->word,
                'body_html' => $faker->randomHtml(2, 3),
                'vendor' => $faker->company,
                'product_type' => $faker->word,
                'packsize' => $faker->randomElement($array = $packsize_array),
                'price' => $faker->numberBetween($min = 10, $max = 500),
                'published' => $faker->boolean
            ]);
        }
    }
}