<?php


use Illuminate\Database\Seeder;


class AdminsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Entities\Admin::truncate();

        \App\Entities\Admin::create( [
            'email' => 'admin@admin.com' ,
            'password' => \Illuminate\Support\Facades\Hash::make( 'password' ) ,
            'name' => 'Faisal Kabeer' ,
        ] );
    }
}