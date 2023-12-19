<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    protected $validationRules = [
        'categoria' => 'required',
        'titolo' => 'required',
        'agency_id' => 'required',
        'sottotitolo' => 'nullable',
        'descrizione' => 'required',
        'immagine' => 'image|max:2048|mimes:jpg,png,gif',
        'video_corso' => 'url:http,https|nullable',
        'durata' => 'required|max:3',
        'competenze_partenza' => 'required',
        'prezzo' => 'required|numeric',
        'programma' => 'required',
        'obiettivi' => 'required',
        'descrizione_attestato' => 'nullable',
        'lingua' => 'required',
        'a_chi_si_rivolge' => 'required',
        'requisiti_richiesti' => 'required'
    ];

    protected $customMessages = [];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni l'utente autenticato (o l'utente di cui vuoi ottenere i corsi)
        $user = auth()->user(); // Ottieni l'utente autenticato

        // Ottieni tutte le agenzie associate all'utente
        $agencies = $user->agencies->pluck('id'); // Ottieni gli ID delle agenzie dell'utente

        // Ottieni i corsi associati alle agenzie dell'utente
        $courses = Course::whereIn('agency_id', $agencies)->get();

        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $categoriaCorso = [
            'diesgno' => 'disegno',
            'informatica' => 'informatica',
            'foto' => 'foto'
        ];

        $lingueErogazioneCorso = [
            'Italiano' => 'Italiano',
            'Francese' => 'Francese',
            'Inglese' => 'Inglese',
            'Spagnolo' => 'Spagnolo',
            'Tedesco' => 'Tedesco',
            'Cinese' => 'Cinese',
        ];

        $user = Auth::user();

        $agencies = $user->agencies;

        return view('admin.course.create', compact('course', 'lingueErogazioneCorso', 'categoriaCorso', 'agencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $data = $request->validate($this->validationRules);
        if ($request->hasFile('immagine')) {
            $data['immagine'] = Storage::put('uploads/img/courses', $data['immagine']);
        }
        $data['slug'] = Str::slug($data['titolo']);
        $newCourse = new Course();
        $newCourse->fill($data);
        $newCourse->save();

        return redirect()->route('admin.course.show', $newCourse->id)->with('message', "$newCourse->nome AGGIUNTA CON SUCCESSO!!!");
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
        $lingueErogazioneCorso = [
            'Italiano' => 'Italiano',
            'Francese' => 'Francese',
            'Inglese' => 'Inglese',
            'Spagnolo' => 'Spagnolo',
            'Tedesco' => 'Tedesco',
            'Cinese' => 'Cinese',
        ];
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
}
