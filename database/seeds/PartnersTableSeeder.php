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
                'is_active'=> true,
                'preferences->api' => 'http://epharma.com.bd/epharma_web/public',
                'preferences->api_key' => 'TM@The@The@Messenger@ePharma',
                'preferences->discount_percentage' => 20,
                'preferences->min_discount_amount' => 2000,
                'preferences->partner_min_delivery_value' => 0,
                'preferences->partner_delivery_charge' => 2000,
            ]);

        $partner  = \App\Entities\Partner::create([
            'name'=> 'xyz',
            'email'=> 'info@xyz.com.bd',
            'phone'=> '',
            'website'=> 'http://xyz.com.bd',
            'is_active'=> true,
            'preferences->api' => 'http://epharma.com.bd/epharma_web/public',
            'preferences->api_key' => 'TM@The@The@Messenger@ePharma',
            'preferences->discount_percentage' => 20,
            'preferences->min_discount_amount' => 2000,
            'preferences->partner_min_delivery_value' => 0,
            'preferences->partner_delivery_charge' => 2000,
        ]);

    }
}
