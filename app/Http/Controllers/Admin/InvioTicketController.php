<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvioTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvioTicketController extends Controller
{
    public function inviaRichiesta(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'messaggio' => $request->input('messaggio'),
        ];

        // Invia l'email
        $emailTo = env('MAIL_TO_ADDRESS');
        Mail::to($emailTo)->send(new InvioTicket($data));

        return redirect()->back()->with('ticket-inviato', 'La tua richiesta è stata inviata con successo.');
    }
}
