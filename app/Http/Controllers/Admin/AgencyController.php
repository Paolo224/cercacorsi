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
        'logo' => 'image|max:512|mimes:jpg,png,svg',
        'immagine_copertina' => 'image|max:512|mimes:jpg,png,svg',
        'video_presentazione' => 'mimetypes:video/mp4',
        'descrizione' => 'required',
        'motto' => 'required',
        'altre_informazioni' => 'required',
        'telefono1' => 'required',
        'telefono2' => 'required',
        'email' => 'required',
        'indirizzo' => 'required',
        'citta' => 'required',
        'provincia' => 'required',
        'paese' => 'required',
        'cap' => 'required',
        'ragione_sociale' => 'required',
        'p_iva' => 'required',
        'codice_fiscale' => 'required',
        'pec_sdi' => 'required',
        'tipo' => 'required',
    ];

    protected $customMessages = [];

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
        return view('admin.agency.create', compact('agency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);
        if ($request->hasFile('logo')) {
            $data['logo'] = Storage::put('uploads/img', $data['logo']);
        }
        if ($request->hasFile('immagine_copertina')) {
            $data['immagine_copertina'] = Storage::put('uploads/img', $data['immagine_copertina']);
        }
        if ($request->hasFile('video_presentazione')) {
            $data['video_presentazione'] = Storage::put('uploads/video', $data['video_presentazione']);
        }
        $data['slug'] = Str::slug($data['nome']);
        $data['user_id'] = Auth::user()->id;
        $newAgency = new Agency();
        $newAgency->fill($data);
        $newAgency->save();

        return redirect()->route('admin.agency.show', $newAgency->id)->with('message', "$newAgency->nome AGGIUNTA CON SUCCESSO!!!");
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
        return view('admin.agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $data = $request->validate([
            'nome' => ['required', Rule::unique('agencies')->ignore($agency->id)],
            'logo' => 'image|max:512|mimes:jpg,png,svg',
            'immagine_copertina' => 'image|max:512|mimes:jpg,png,svg',
            'video_presentazione' => 'mimetypes:video/mp4',
            'descrizione' => 'required',
            'motto' => 'required',
            'altre_informazioni' => 'required',
            'telefono1' => 'required',
            'telefono2' => 'required',
            'email' => 'required',
            'indirizzo' => 'required',
            'citta' => 'required',
            'provincia' => 'required',
            'paese' => 'required',
            'cap' => 'required',
            'ragione_sociale' => 'required',
            'p_iva' => 'required',
            'codice_fiscale' => 'required',
            'pec_sdi' => 'required',
            'tipo' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            Storage::delete($agency->logo);
            $data['logo'] = Storage::put('uploads/img', $data['logo']);
        }
        if ($request->hasFile('immagine_copertina')) {
            Storage::delete($agency->immagine_copertina);
            $data['immagine_copertina'] = Storage::put('uploads/img', $data['immagine_copertina']);
        }
        if ($request->hasFile('video_presentazione')) {
            Storage::delete($agency->video_presentazione);
            $data['video_presentazione'] = Storage::put('uploads/video', $data['video_presentazione']);
        }

        $agency->update($data);
        return redirect()->route('admin.agency.show', compact('agency'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
