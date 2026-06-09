<?php

namespace App\Mail;

use App\Models\Giveaway;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GiveawayWinnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Giveaway $giveaway)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'FITSTORE giveaway winner');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.giveaway-winner-mail');
    }
}
