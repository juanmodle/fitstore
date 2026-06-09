<?php

namespace App\Mail;

use App\Models\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CouponUsedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Coupon $coupon)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'FITSTORE coupon used');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.coupon-used-mail');
    }
}
