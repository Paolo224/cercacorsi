<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ChangeStatusTicket;
use App\Mail\InvioTicket;
use App\Models\Admin\Ticket;
use App\Models\User;
use App\Notifications\TicketChangeStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{

    protected $validationRules = [
        'titolo' => 'required',
        'descrizione' => 'required',
        'allegato' => 'max:2048|mimes:jpg,png,pdf,docx',
    ];

    protected $customMessages = [
        'titolo.required' => 'Inserire il titolo del ticket!',
        'descrizione.required' => 'La descrizione è obbligatoria!',
        'allegato.max' => 'L\'immagine non può pesare più di 2mb',
        'allegato.mimes' => 'L\'immagine deve essere di tipo: .jpg .png .pdf .docx',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->super_admin_role != null) {
            $tickets = Ticket::latest()->get();
        } else {
            $tickets = Ticket::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        }
        return view('admin.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules, $this->customMessages);
        if ($request->hasFile('allegato')) {
            $data['allegato'] = Storage::put('uploads/img/ticket_file', $data['allegato']);
        }
        $data['user_id'] = Auth::user()->id;
        $newTicket = new Ticket();
        $newTicket->fill($data);
        $newTicket->save();

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new InvioTicket($newTicket));

        return redirect()->back()->with('ticket-inviato', 'ticket inviato con successo!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function aperto(Ticket $ticket)
    {
        $ticket->status = 'aperto';
        $ticket->save();


        return redirect()->back();
    }

    public function chiuso(Ticket $ticket)
    {
        $ticket->status = 'chiuso';
        $ticket->save();

        Mail::to(User::find($ticket->user_id)->email)->send(new ChangeStatusTicket($ticket));

        return redirect()->back();
    }

    public function respinto(Ticket $ticket)
    {
        $ticket->status = 'respinto';
        $ticket->save();

        Mail::to(User::find($ticket->user_id)->email)->send(new ChangeStatusTicket($ticket));

        return redirect()->back();
    }
}
