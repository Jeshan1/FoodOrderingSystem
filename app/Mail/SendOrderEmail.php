<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name,$cart,$subject;
    public function __construct($name,$cart,$subject)
    {
        $this->name = $name;
        $this->cart = $cart;
        $this->subject = $subject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        try {
        //     $name = $this->name;
        //     $cart = $this->cart;
        //     $subject = $this->subject;
        // return $this->from("jectionjection@gmail.com",config('app.name'))
        //             ->subject($subject)
        //             ->markdown("email.sendOrderEmail",compact('name','cart'));

        return new Content
        (
            view:"email.sendOrderEmail",
        );

        

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
