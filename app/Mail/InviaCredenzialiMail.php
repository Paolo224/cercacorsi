<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class InviaCredenzialiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datiEmail;
    public $password;

    public function __construct($datiEmail, $password)
    {
        $this->datiEmail = $datiEmail;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Credenziali di accesso')->view('emails.invia_credenziali');
    }
}
