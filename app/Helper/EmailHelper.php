<?php

namespace App\Helper;
use App\Jobs\SendEmailJob;
use App\Jobs\VendorEmailJob;
use App\Jobs\SendEmailCustomerJOb;
use Illuminate\Support\Facades\Log;
// use Carbon\Carbon;
class EmailHelper
{
    public static function sendEmail($data)
    {
        try {
            $emailjob = (new sendEmailJob($data));
            dispatch($emailjob);
        } catch (\Throwable $e) {
            dump($e->getMessage());
        }
    }

    public static function sendVendorEmail($vendorContent,$deliveryInfo,$subject)
    {
        try {
            foreach ($vendorContent as $email => $content) {
                $emailjob = (new VendorEmailJob($content,$deliveryInfo,$subject,$email));
                dispatch($emailjob);
            }
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }

    // for send email to customer while product processed

    public static function sendCustomerEmail($data)
    {
        try {
            $emailjob = (new SendEmailCustomerJOb($data));
            dispatch($emailjob);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
        // to enable time delay
        // ->delay(Carbon::now()->addMinutes(1))
?>