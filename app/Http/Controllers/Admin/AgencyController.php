<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AgencyController extends Controller
{

    protected $validationRules = [
        'nome' => ['required', 'unique:agencies'],
        'descrizione' => 'required',
        'p_iva' => 'required',
        'telefono' => 'required',
        'citta' => 'required',
        'paese' => 'required',
        'indirizzo' => 'required',
        'cap' => 'required',
        'ragione_sociale' => 'required',
        'tipo' => 'required',
        'pec_sdi' => 'required',
        'logo' => 'required|image|max:512',
        'immagine_copertina' => 'required|image|max:512'
    ];

    protected $customMessages = [];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agencies = Agency::all();
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
        // dd($request->all());
        $data = $request->validate($this->validationRules);
        $data['slug'] = Str::slug($data['nome']);
        $newAgency = new Agency();
        $newAgency->fill($data);
        $newAgency->logo = Storage::put('uploads', $data['logo']);
        $newAgency->immagine_copertina = Storage::put('uploads', $data['immagine_copertina']);
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
            'descrizione' => 'required',
            'p_iva' => 'required',
            'telefono' => 'required',
            'citta' => 'required',
            'paese' => 'required',
            'indirizzo' => 'required',
            'cap' => 'required',
            'ragione_sociale' => 'required',
            'tipo' => 'required',
            'pec_sdi' => 'required',
            'logo' => 'image|max:512',
            'immagine_copertina' => 'image|max:512'
        ]);

        if ($request->hasFile('logo')) {

            if (str_starts_with($agency->logo, 'http')) {
                Storage::delete($agency->logo);
            }

            $data['logo'] = Storage::put('uploads', $data['logo']);
        } else if ($request->hasFile('immagine_copertina')) {

            if (str_starts_with($agency->immagine_copertina, 'http')) {
                Storage::delete($agency->immagine_copertina);
            }

            $data['immagine_copertina'] = Storage::put('uploads', $data['immagine_copertina']);
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
