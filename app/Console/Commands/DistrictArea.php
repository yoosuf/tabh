<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;


class DistrictArea extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quicksilver:dump-district-area';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client([
            'headers' => [ 
                        'Content-Type' => 'application/json' ,
                        'api-key' => 'TM@The@The@Messenger@ePharma' ]
        ]);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("\n");
        $this->info('District add-to-db');
        
        try {

            $res = $this->client->get('http://epharma.com.bd/epharma_web/public/api/district-list');
            $response = json_decode($res->getBody()->getContents());

            if (\App\Entities\District::count() != '64') {
                if ($response->success == true) {
                    foreach($response->result as $district) {
                        \App\Entities\District::updateOrCreate([
                            'id' => $district->id,
                        ], [
                            'name' => $district->name,
                        ]);
                        $this->info($district->id);
                        $this->info($district->name);
                    }
                }
            } else {
                $districts = \App\Entities\District::all();

                foreach($districts as $dictsrict) {

                    $this->info("District ID: " . $dictsrict->id);
                    $this->info("District Name: " . $dictsrict->name);
                    $res = $this->client->request('post', 'http://epharma.com.bd/epharma_web/public/api/area-list', 
                        [
                            'query' => [
                                'district_id' => $dictsrict->id
                            ]
                        ]);
                    
                    $response = json_decode($res->getBody()->getContents());

                    if ($response->success == true) {

                        foreach($response->result as $area) {
                            \App\Entities\City::updateOrCreate([
                                'id' => $area->id,
                            ], [
                                'district_id' => $dictsrict->id, 
                                'name' => $area->name,
                            ]);

                            $this->info($area->name);
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $this->info("\n");
            $this->error('DIstrict Not Found');
            $this->info("\n");
        }
    }
}
