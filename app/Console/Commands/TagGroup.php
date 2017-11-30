<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class TagGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quicksilver:tag-groups';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate tag groups for Quicksilver';

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

        $this->info('Tag group initialize');
        $this->info('Creating Tag group Customers initialize');
        exec("php artisan tagging:create-group Customers");
        $this->info('Creating Tag group Customers created');
        $this->info('Creating Tag group Products initialize');
        exec("php artisan tagging:create-group Products");
        $this->info('Creating Tag group Products created');
        $this->info('Creating Tag group Partners initialize');
        exec("php artisan tagging:create-group Partners");
        $this->info('Creating Tag group Partners created');
        $this->info('Creating Tag group Orders initialize');
        exec("php artisan tagging:create-group Orders");
        $this->info('Creating Tag group Orders created');
        return $this->info('All good, Tag groups set to go');


    }
}
