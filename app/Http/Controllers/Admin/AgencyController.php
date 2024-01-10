<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AgencyController extends Controller
{

    protected $validationRules = [
        'nome' => ['required', 'unique:agencies'],
        'logo' => 'image|max:2048|mimes:jpg,png,gif',
        'immagine_copertina' => 'image|max:2048|mimes:jpg,png,gif',
        'video_presentazione' => 'url:http,https|nullable|regex:/\byoutube\b/',
        'descrizione' => 'required',
        'motto' => 'nullable|max:255',
        'altre_informazioni' => 'nullable',
        'telefono1' => 'required|max:10',
        'telefono2' => 'nullable|max:10',
        'email' => 'required|email:rfc,dns',
        'indirizzo' => 'required',
        'citta' => 'required',
        'provincia' => 'required|max:2',
        'paese' => 'required',
        'cap' => 'required|max:5',
        'ragione_sociale' => 'required',
        'p_iva' => 'required|max:13',
        'codice_fiscale' => 'nullable|max:16',
        'sdi' => 'required|max:7',
        'pec' => 'required|regex:/\b@pec.it\b/',
        'visibile' => 'required',
        'whatsapp' => ['regex:/\bwhatsapp\b/', 'nullable'],
        'facebook' => ['regex:/\bfacebook\b/', 'nullable'],
        'linkedin' => ['regex:/\blinkedin\b/', 'nullable'],
        'tiktok' => ['regex:/\btiktok\b/', 'nullable'],
        'youtube' => ['regex:/\byoutube\b/', 'nullable'],
        'instagram' => ['regex:/\binstagram\b/', 'nullable'],
        'tipo' => 'required',
    ];

    protected $customMessages = [
        'nome.required' => 'Inserisci il nome dell\'Azienda.',
        'nome.unique' => 'Azienda gia esistente!',
        'logo.image' => 'Il logo Aziendale non è valido!',
        'logo.max' => 'Il logo Aziendale non può pesare più di 2mb',
        'logo.mimes' => 'Il logo Aziendale deve essere di tipo: jpg, png o gif',
        'immagine_copertina.image' => 'L\'immagine di copertina non è valida!',
        'immagine_copertina.max' => 'L\'immagine di copertina non può pesare più di 2mb',
        'immagine_copertina.mimes' => 'L\'immagine di copertina deve essere di tipo: jpg, png o gif',
        'video_presentazione.url' => 'Link non valido!',
        'video_presentazione.regex' => 'Link non valido! Inserire un link di youtube!',
        'descrizione.required' => 'La descrizione è obbligatoria!',
        'motto.max' => 'Il motto Aziendale non può superare i 255 caratteri!',
        'telefono1.required' => 'Telefono obbligatorio!',
        'telefono1.max' => 'Il campo telefono non può superare i 10 caratteri!',
        'telefono2.max' => 'Il campo telefono non può superare i 10 caratteri!',
        'email.required' => 'Il campo email è obbligatorio!',
        'email.email' => 'Mail non valida!',
        'indirizzo.required' => 'L\'indirizzo è obbligatorio!',
        'citta.required' => 'Il campo città è obbligatorio!',
        'cap.required' => 'Il codice postale è obbligatorio!',
        'cap.max' => 'Il codice postale non può superare i 5 caratteri!',
        'provincia.required' => 'Il campo provincia è obbligatorio!',
        'provincia.max' => 'Il campo provincia non può superare i 2 caratteri!',
        'paese.required' => 'Il campo paese è obbligatorio!',
        'ragione_sociale.required' => 'Il campo Ragione Sociale è obbligatorio!',
        'p_iva.required' => 'La Partita IVA è obbligatoria!',
        'p_iva.max' => 'La Partita IVA non può avere più 13 caratteri!',
        'codice_fiscale.max' => 'Il codice fiscale non può avere più 16 caratteri!',
        'sdi.max' => 'Il codice SDI non può avere più 7 caratteri!',
        'sdi.required' => 'Il codice SDI è obbligatorio!',
        'pec.required' => 'La Pec è obbligatoria!',
        'pec.regex' => 'Pec non valida!',
        'tipo.required' => 'Il campo tipologia è obbligatorio!',
        'whatsapp.regex' => 'Link non valido!',
        'tiktok.regex' => 'Link non valido!',
        'instagram.regex' => 'Link non valido!',
        'facebook.regex' => 'Link non valido!',
        'linkedin.regex' => 'Link non valido!',
        'youtube.regex' => 'Link non valido!'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $agencies = $user->agencies;
        return view('admin.agency.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Agency $agency)
    {

        $provinceItaliane = $agency->provinceItaliane();

        $paesiMondiali = $agency->paesiMondiali();

        $tipologiaAziendale = $agency->tipologiaAziendale();

        return view('admin.agency.create', compact('agency', 'provinceItaliane', 'paesiMondiali', 'tipologiaAziendale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules, $this->customMessages);
        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::put('uploads/img', $data['logo']);
        }
        if ($request->hasFile('immagine_copertina')) {
            $data['immagine_copertina'] = Storage::put('uploads/img', $data['immagine_copertina']);
        }
        $data['slug'] = Str::slug($data['nome']);
        $data['user_id'] = Auth::user()->id;
        $newAgency = new Agency();
        $newAgency->fill($data);
        $newAgency->save();

        return redirect()->route('admin.le-mie-aziende.show', $newAgency->slug)->with('message', "$newAgency->nome AGGIUNTA CON SUCCESSO!!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        return view('admin.agency.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {

        $paesiMondiali = $agency->paesiMondiali();

        $provinceItaliane = $agency->provinceItaliane();

        $tipologiaAziendale = $agency->tipologiaAziendale();

        return view('admin.agency.edit', compact('agency', 'provinceItaliane', 'paesiMondiali', 'tipologiaAziendale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        // $data = $request->validate([
        //     'nome' => ['required', Rule::unique('agencies')->ignore($agency->id)],
        //     'logo' => 'image|max:2048|mimes:jpg,png,gif',
        //     'immagine_copertina' => 'image|max:2048|mimes:jpg,png,gif',
        //     'video_presentazione' => 'url:http,https|nullable',
        //     'descrizione' => 'required',
        //     'motto' => 'nullable',
        //     'altre_informazioni' => 'nullable',
        //     'telefono1' => 'required|max:10',
        //     'telefono2' => 'nullable|max:10',
        //     'email' => 'required|',
        //     'indirizzo' => 'required',
        //     'citta' => 'required',
        //     'provincia' => 'required|max:2',
        //     'paese' => 'required',
        //     'cap' => 'required|max:5',
        //     'ragione_sociale' => 'required',
        //     'p_iva' => 'required|max:13',
        //     'codice_fiscale' => 'required|max:16',
        //     'sdi' => 'required|max:7',
        //     'pec' => 'required',
        //     'visibile' => 'required',
        //     'whatsapp' => ['regex:/\bwhatsapp\b/', 'nullable'],
        //     'facebook' => ['regex:/\bfacebook\b/', 'nullable'],
        //     'linkedin' => ['regex:/\blinkedin\b/', 'nullable'],
        //     'tiktok' => ['regex:/\btiktok\b/', 'nullable'],
        //     'youtube' => ['regex:/\byoutube\b/', 'nullable'],
        //     'instagram' => ['regex:/\binstagram\b/', 'nullable'],
        //     'tipo' => 'required',
        // ]);

        $newRules = $this->validationRules;
        $newRules['nome'] = ['required', Rule::unique('agencies')->ignore($agency->id)];
        $data = $request->validate($newRules, $this->customMessages);

        if ($request->hasFile('logo')) {
            if ($agency->logo !== 'immagine_placeholder.jpg') {
                Storage::delete($agency->logo);
            }
            $data['logo'] = Storage::put('uploads/img', $data['logo']);
        }
        if ($request->hasFile('immagine_copertina')) {
            if ($agency->immagine_copertina !== 'immagine_placeholder_copertina.png') {
                Storage::delete($agency->immagine_copertina);
            }
            $data['immagine_copertina'] = Storage::put('uploads/img', $data['immagine_copertina']);
        }

        $agency->update($data);
        return redirect()->route('admin.le-mie-aziende.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function enableToggle(Agency $agency)
    {
        $agency->visibile = !$agency->visibile;
        $agency->save();

        return redirect()->route('admin.le-mie-aziende.index');
    }
}
