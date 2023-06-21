<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SendCustomerEmail;

class SendEmailCustomerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $name,$email,$cart,$subject;
    public function __construct($data)
    {
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->cart = $data['cart'];
        $this->subject = $data['subject'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
             Mail::to($this->email)->send(new SendCustomerEmail($this->name,$this->cart,$this->subject));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
