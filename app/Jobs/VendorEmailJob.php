<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVendorEmail;

class VendorEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     public $content,$deliveryInfo,$subject,$email;
    public function __construct($content,$deliveryInfo,$subject,$email)
    {
        $this->content = $content;
        $this->deliveryInfo = $deliveryInfo;
        $this->subject = $subject;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->email)->send(new SendVendorEmail($this->content,$this->deliveryInfo,$this->subject));
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
