<?php

namespace App\Jobs\App\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\App\Order\NewOrder as NewOrderMail;
use Illuminate\Support\Facades\Mail;

class NewOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    
    protected $user;

    protected $order;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new NewOrderMail($this->user, $this->order);

        Mail::to($this->user->email)->send($email);
    }
}
