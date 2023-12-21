<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
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
        'prezzo' => 'nullable|numeric',
        'programma' => 'required',
        'obiettivi' => 'required',
        'attestato' => 'required',
        'descrizione_attestato' => 'nullable',
        'lingua' => 'required',
        'fad' => 'nullable',
        'on_site' => 'nullable',
        'in_aula' => 'nullable',
        'visibile' => 'required',
        'a_chi_si_rivolge' => 'required',
        'requisiti_richiesti' => 'required'
    ];

    protected $customMessages = [];


    public function Visibili(Request $request, Course $course)
    {
        $filteredCourses = Course::where('visibile', 1)->get();

        $categoriaCorso = $course->categoriaCorso();

        $user = Auth::user();

        $AllAgencies = $user->agencies;

        return view('admin.course.index', ['courses' => $filteredCourses, 'categoriaCorso' => $categoriaCorso, 'AllAgencies' => $AllAgencies]);
    }

    public function NonVisibili(Request $request, Course $course)
    {
        $filteredCourses = Course::where('visibile', 0)->get();

        $categoriaCorso = $course->categoriaCorso();

        $user = Auth::user();

        $AllAgencies = $user->agencies;

        return view('admin.course.index', ['courses' => $filteredCourses, 'categoriaCorso' => $categoriaCorso, 'AllAgencies' => $AllAgencies]);
    }

    public function Categoria(Request $request, Course $course)
    {
        $selectedCategoria = $request->input('categoriaFilter');

        $categoriaCorso = $course->categoriaCorso();

        $user = Auth::user();

        $AllAgencies = $user->agencies;

        $filteredCourses = Course::where('categoria', $selectedCategoria)->get();

        return view('admin.course.index', ['courses' => $filteredCourses, 'categoriaCorso' => $categoriaCorso, 'AllAgencies' => $AllAgencies]);
    }

    public function Agency(Request $request, Course $course)
    {
        $selectedAgency = $request->input('AgencyFilter');

        $categoriaCorso = $course->categoriaCorso();

        $user = Auth::user();

        $AllAgencies = $user->agencies;

        $filteredCourses = Course::where('agency_id', $selectedAgency)->get();

        return view('admin.course.index', ['courses' => $filteredCourses, 'categoriaCorso' => $categoriaCorso, 'AllAgencies' => $AllAgencies]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $categoriaCorso = $course->categoriaCorso();

        // Ottieni l'utente autenticato (o l'utente di cui vuoi ottenere i corsi)
        $user = auth()->user(); // Ottieni l'utente autenticato

        // Ottieni tutte le Aziende associate all'utente
        $agencies = $user->agencies->pluck('id'); // Ottieni gli ID delle Aziende dell'utente

        // Ottieni i corsi associati alle Aziende dell'utente
        $courses = Course::whereIn('agency_id', $agencies)->get();

        $AllAgencies = $user->agencies;

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

        $agencies = $user->agencies;

        return view('admin.course.create', compact('course', 'lingueErogazioneCorso', 'categoriaCorso', 'agencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);
        if ($request->hasFile('immagine')) {
            $data['immagine'] = Storage::put('uploads/img/courses', $data['immagine']);
        }
        $data['slug'] = Str::slug($data['titolo']);


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

        return redirect()->route('admin.tutti-i-corsi.show', $newCourse->id)->with('message', "$newCourse->nome AGGIUNTA CON SUCCESSO!!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
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

        $agencies = $user->agencies;

        return view('admin.course.edit', compact('course', 'categoriaCorso', 'lingueErogazioneCorso', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // dd($request);
        $data = $request->validate([
            'categoria' => 'required',
            'titolo' => 'required',
            'agency_id' => 'required',
            'sottotitolo' => 'nullable',
            'descrizione' => 'required',
            'immagine' => 'image|max:2048|mimes:jpg,png,gif',
            'video_corso' => 'url:http,https|nullable',
            'durata' => 'required|max:3',
            'competenze_partenza' => 'required',
            'prezzo' => 'nullable|numeric',
            'programma' => 'required',
            'obiettivi' => 'required',
            'attestato' => 'required',
            'descrizione_attestato' => 'nullable',
            'lingua' => 'required',
            'fad' => 'nullable',
            'on_site' => 'nullable',
            'in_aula' => 'nullable',
            'visibile' => 'required',
            'a_chi_si_rivolge' => 'required',
            'requisiti_richiesti' => 'required'
        ]);

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
        return redirect()->route('admin.tutti-i-corsi.show', compact('course'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
