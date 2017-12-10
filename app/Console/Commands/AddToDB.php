<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp;
use Illuminate\Database\Eloquent;

class AddToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quicksilver:add-to-db {partner_email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add products from api to Quicksilver db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("\n");
        $this->info('add-to-db initialized');
        $client = new GuzzleHttp\Client();
        $index = 1;
        $products_per_page = 20;
        $partner_email = $this->argument('partner_email');

        try {
            $partner = \App\Entities\Partner::where('email', $partner_email)->firstOrFail();
            $this->info("\n");
            $this->info($partner);
            $this->info("\n");


            $partner_api = $partner->api;

            $partner_api_key = json_decode($partner->preferences)->api_key;

            $res = $client->request('GET', $partner_api . '?page=' . $index,
                ['headers' => ['api-key' => $partner_api_key]]);
            $response = json_decode($res->getBody()->getContents());
            $total_products = $response->total_count;
            $pages = $total_products / $products_per_page;
            $bar = $this->output->createProgressBar($pages);

            for (; $index < $pages; $index++) {

                try {
                    $res = $client->request('GET', $partner_api . '?page=' . $index,
                        ['headers' => ['api-key' => $partner_api_key]]);
                    $response = json_decode($res->getBody()->getContents());

                    $bar_per_page = $this->output->createProgressBar($products_per_page);

                    if ($response->success == true) {
                        $this->info("\n");
                        $this->info('Processing page : ' . $index); // { "type": "User", ....
//                        $this->info(json_encode($response));
                        $this->info("\n");

                        foreach ($response->result as $product) {
                            $partner->products()->updateOrCreate([
                                'external_id' => $product->product_id,
                            ],
                                [
                                    'title' => $product->product_name,
                                    'generic_name' => $product->generic_name,
                                    'body_html' => '',
                                    'vendor' => $product->company_name,
                                    'product_type' => $product->type,
                                    'packsize' => $product->packsize,
                                    'price' => $product->price,
                                    'published' => (float)$product->price === (float)0.0 ? false : true
                                ]);
                            $bar_per_page->advance();
                        }
                        $bar_per_page->finish();

                        $this->info("\n");
                        $this->info('Processing page : ' . $index . ' completed'); // { "type": "User", ....
//                        $this->info(json_encode($response));
                        $this->info("\n");
                    }
                } catch (\GuzzleHttp\Exception\ClientException $e) {
                    $this->error($e);
                } catch (\GuzzleHttp\Exception\ServerException $e) {
                    $this->error($e);
                }

                $bar->advance();
            }

            $bar->finish();

        } catch (\Exception $e) {
            $this->info("\n");
            $this->error('Partner Not Found');
            $this->info("\n");
        }
    }
}
