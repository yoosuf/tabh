<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE partners CASCADE');

            $partner  = \App\Entities\Partner::create([
                'name'=> 'epharma',
                'email'=> 'info@epharma.com.bd',
                'phone'=> '',
                'website'=> 'http://epharma.com.bd',
                'preferences->api' => 'http://epharma.com.bd/epharma_web/public/api/product-list',
                'preferences->api_key' => 'TM@The@The@Messenger@ePharma',
                'preferences->discount_percentage' => 20,
                'preferences->max_discount_amount' => 2000
            ]);

    }
}
