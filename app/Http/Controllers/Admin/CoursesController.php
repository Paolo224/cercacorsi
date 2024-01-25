<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\Admin\AssegnazioneAziendeAiGestori;
use App\Models\Admin\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    protected $validationRules = [
        'categoria' => 'required',
        'titolo' => 'required',
        'agency_id' => 'required',
        'sottotitolo' => 'nullable|max:255',
        'descrizione' => 'required',
        'immagine' => 'image|max:2048|mimes:jpg,png,gif',
        'video_corso' => 'url:http,https|nullable|regex:/\byoutube\b/',
        'durata' => 'required|max:3',
        'competenze_partenza' => 'required|max:255',
        'prezzo' => 'nullable|numeric',
        'programma' => 'required',
        'obiettivi' => 'required|max:255',
        'attestato' => 'required|max:255',
        'descrizione_attestato' => 'nullable',
        'lingua' => 'required',
        'fad' => 'nullable',
        'on_site' => 'nullable',
        'in_aula' => 'nullable',
        'visibile' => 'required',
        'a_chi_si_rivolge' => 'required|max:255',
        'requisiti_richiesti' => 'required|max:255'
    ];

    protected $customMessages = [
        'categoria.required' => 'Specificare la categoria del corso!',
        'titolo.required' => 'Inserire il titolo del corso!',
        'agency_id.required' => 'Inserire l\'Azienda di riferimento',
        'sottotitolo.max' => 'Il sottotitolo non può superare i 255 caratteri!',
        'descrizione.required' => 'La descrizione è obbligatoria!',
        'immagine.image' => 'L\'immagine non è valida!',
        'immagine.max' => 'L\'immagine non può pesare più di 2mb',
        'immagine.mimes' => 'L\'immagine deve essere di tipo: jpg, png o gif',
        'video_corso.url' => 'Link non valido!',
        'video_corso.regex' => 'Link non valido! Inserire un link di youtube!',
        'durata.max' => 'Il campo non accetta più di 3 caratteri numerici',
        'competenze_partenza.required' => 'Inserire le competenze di partenza',
        'competenze_partenza.max' => 'Questo campo non può superare i 255 caratteri!',
        'prezzo.numeric' => 'Questo campo accetta solo valori numerici',
        'programma.required' => 'Inserire il programma del corso',
        'obiettivi.required' => 'Inserire gli obiettivi del corso',
        'obiettivi.max' => 'Questo campo non può superare i 255 caratteri!',
        'lingua.required' => 'Selezionare la lingua del corso',
        'a_chi_si_rivolge.required' => 'Specificare a chi è rivolto il corso',
        'a_chi_si_rivolge.max' => 'Questo campo non può superare i 255 caratteri!',
        'requisiti_richiesti.required' => 'Indicare i requisiti richiesti',
        'requisiti_richiesti.max' => 'Questo campo non può superare i 255 caratteri!'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        // $user = auth()->user();
        // $agencies = $user->agencies->pluck('id');

        // $AllAgencies = $user->agencies;
        // $categoriaCorso = $course->categoriaCorso();
        // // Ottieni i corsi associati alle Aziende dell'utente
        // $courses = Course::whereIn('agency_id', $agencies)->get();

        $user = auth()->user();

        if ($user->id_admin === 0) {
            // Utente admin
            $AllAgencies = $user->agencies;
            $agencies = $user->agencies->pluck('id');
            $courses = Course::whereIn('agency_id', $agencies)->get();
        } else {
            // Utente non admin
            // Recupera l'id dell'utente corrente
            $userId = $user->id;

            // Ottieni gli id delle aziende assegnate al gestore dalla tabella di assegnazione
            $agencies = AssegnazioneAziendeAiGestori::where('id_gestore', $userId)->pluck('id_azienda');

            // Ottieni tutti i corsi associati alle aziende assegnate al gestore
            $courses = Course::whereIn('agency_id', $agencies)->get();

            // Ottieni tutte le aziende assegnate al gestore
            $AllAgencies = Agency::whereIn('id', $agencies)->get();
        }


        $categoriaCorso = $course->categoriaCorso();

        return view('admin.course.index', compact('courses', 'categoriaCorso', 'AllAgencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $categoriaCorso = $course->categoriaCorso();

        $lingueErogazioneCorso = $course->lingueErogazioneCorso();

        $user = Auth::user();
        if ($user->id_admin === 0) {
            $AllAgencies = $user->agencies;
        } else {
            // Ottieni gli id delle aziende assegnate al gestore dalla tabella di assegnazione
            $agencies = AssegnazioneAziendeAiGestori::where('id_gestore', $user->id)->pluck('id_azienda');

            // Ottieni tutti i corsi associati alle aziende assegnate al gestore
            $courses = Course::whereIn('agency_id', $agencies)->get();

            // Ottieni tutte le aziende assegnate al gestore
            $AllAgencies = Agency::whereIn('id', $agencies)->get();
        }

        return view('admin.course.create', compact('course', 'lingueErogazioneCorso', 'categoriaCorso', 'AllAgencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules, $this->customMessages);
        if ($request->hasFile('immagine')) {
            $data['immagine'] = Storage::put('uploads/img/courses', $data['immagine']);
        }
        $data['slug'] = Str::slug($data['titolo']);
        $num = 1;
        while (DB::table('courses')->where('slug', $data['slug'])->first()) {
            $slug = Str::slug($data['titolo']) . '-' . $num;
            $num++;
            $data['slug'] = $slug;
        }

        if (!$request->has('fad')) {
            $data['fad'] = 0;
        }

        if (!$request->has('in_aula')) {
            $data['in_aula'] = 0;
        }

        if (!$request->has('on_site')) {
            $data['on_site'] = 0;
        }

        $newCourse = new Course();
        $newCourse->fill($data);
        $newCourse->save();

        return redirect()->route('admin.tutti-i-corsi.index')->with('message-create', "Corso di $newCourse->nome Aggiunto con successo!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // Ottieni l'utente autenticato
        $user = auth()->user();

        if ($user->id_admin !== 0) {
            // Ottieni gli id delle aziende assegnate al gestore dalla tabella di assegnazione
            $agencies = AssegnazioneAziendeAiGestori::where('id_gestore', $user->id)->pluck('id_azienda');

            // Ottieni tutti i corsi associati alle aziende assegnate al gestore
            $courses = Course::whereIn('agency_id', $agencies)->get();

            // Ottieni tutte le aziende assegnate al gestore
            $AllAgencies = Agency::whereIn('id', $agencies)->get();

            // Verifica se l'utente è il proprietario dell'azienda o ha id_admin diverso da 0
            if ($user->id_admin !== $course->agency->user_id) {
                abort(403, 'Non hai il permesso di visualizzare questo corso.');
            }
        } else {
            // Verifica se l'utente è il proprietario dell'azienda o ha id_admin diverso da 0
            // Verifica se l'utente è il proprietario del corso o ha id_admin uguale al suo id
            if ($user->id !== $course->agency->user_id) {
                abort(403, 'Non hai il permesso di visualizzare questo corso.');
            }
        }

        return view('admin.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categoriaCorso = $course->categoriaCorso();

        $lingueErogazioneCorso = $course->lingueErogazioneCorso();

        $user = Auth::user();
        if ($user->id_admin === 0) {
            $AllAgencies = $user->agencies;

            if ($user->id !== $course->agency->user_id) {
                abort(403, 'Non hai il permesso di visualizzare questo corso.');
            }
        } else {
            // Ottieni gli id delle aziende assegnate al gestore dalla tabella di assegnazione
            $agencies = AssegnazioneAziendeAiGestori::where('id_gestore', $user->id)->pluck('id_azienda');

            // Ottieni tutti i corsi associati alle aziende assegnate al gestore
            $courses = Course::whereIn('agency_id', $agencies)->get();

            // Ottieni tutte le aziende assegnate al gestore
            $AllAgencies = Agency::whereIn('id', $agencies)->get();

            if ($user->id_admin !== $course->agency->user_id) {
                abort(403, 'Non hai il permesso di visualizzare questo corso.');
            }
        }

        return view('admin.course.edit', compact('course', 'categoriaCorso', 'lingueErogazioneCorso', 'AllAgencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $newRules = $this->validationRules;
        $newRules['slug'] = ['string', Rule::unique('courses')->ignore($course->id)];
        $data = $request->validate($newRules, $this->customMessages);

        if ($request->hasFile('immagine')) {
            $data['immagine'] = Storage::put('uploads/img/courses', $data['immagine']);
        }

        if (!$request->has('fad')) {
            $data['fad'] = 0;
        }

        if (!$request->has('in_aula')) {
            $data['in_aula'] = 0;
        }

        if (!$request->has('on_site')) {
            $data['on_site'] = 0;
        }

        $course->update($data);
        return redirect()->route('admin.tutti-i-corsi.index')->with('message-edit', "Corso di $course->titolo Aggiornato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
