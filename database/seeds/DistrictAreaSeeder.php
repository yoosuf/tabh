<?php

use Illuminate\Database\Seeder;

class DistrictAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $listing = new \App\Utils\EPharma\Listing();
        $districts = $listing->districts();


        dd($districts);

        // foreach($districts['result'] as $district)
        // {
        //     dd($district);

        // }
    }
}
