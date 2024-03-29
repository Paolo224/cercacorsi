<?php

namespace App\Mail;

use App\Models\Admin\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvioTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $newTicket;

    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $newTicket)
    {
        $this->newTicket = $newTicket;
    }

    public function build()
    {
        return $this->subject("NUOVO TICKET")
            ->view('emails.new_ticket');
    }
}
