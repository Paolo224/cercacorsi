<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
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


    public function Filtri(Request $request, Course $course)
    {
        // dd($request);
        $user = Auth::user();
        $AllAgencies = $user->agencies;
        $categoriaCorso = $course->categoriaCorso();
        $filteredCourses = Course::query();
        //dump($request);
        if ($request->filled('visibile')) {
            $filteredCourses->where('visibile', $request->visibile);
        }

        if ($request->filled('PerCategoria')) {
            $filteredCourses->where('categoria', $request->PerCategoria);
        }

        if ($request->filled('PerAzienda')) {
            $filteredCourses->where('agency_id', $request->PerAzienda);
        }

        // Ordinamento
        if ($request->filled('Ordinamento')) {
            $sort = $request->Ordinamento;

            if ($sort === 'asc') {
                $filteredCourses->orderBy('titolo', 'asc');
            } elseif ($sort === 'desc') {
                $filteredCourses->orderBy('titolo', 'desc');
            }
        }
        // dd($request);
        $courses = $filteredCourses->get();

        return view('admin.course.index', compact('courses', 'categoriaCorso', 'AllAgencies'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $user = auth()->user();
        $agencies = $user->agencies->pluck('id');

        $AllAgencies = $user->agencies;
        $categoriaCorso = $course->categoriaCorso();
        // Ottieni i corsi associati alle Aziende dell'utente
        $courses = Course::whereIn('agency_id', $agencies)->get();

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
        $data = $request->validate($this->validationRules); //, $this->customMessages);
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

        return redirect()->route('admin.tutti-i-corsi.show', $newCourse->slug)->with('message', "$newCourse->nome AGGIUNTA CON SUCCESSO!!!");
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
        // $data = $request->validate([
        //     'categoria' => 'required',
        //     'titolo' => 'required',
        //     'agency_id' => 'required',
        //     'sottotitolo' => 'nullable',
        //     'descrizione' => 'required',
        //     'immagine' => 'image|max:2048|mimes:jpg,png,gif',
        //     'video_corso' => 'url:http,https|nullable',
        //     'durata' => 'required|max:3',
        //     'competenze_partenza' => 'required',
        //     'prezzo' => 'nullable|numeric',
        //     'programma' => 'required',
        //     'obiettivi' => 'required',
        //     'attestato' => 'required',
        //     'descrizione_attestato' => 'nullable',
        //     'lingua' => 'required',
        //     'fad' => 'nullable',
        //     'on_site' => 'nullable',
        //     'in_aula' => 'nullable',
        //     'visibile' => 'required',
        //     'a_chi_si_rivolge' => 'required',
        //     'requisiti_richiesti' => 'required'
        // ]);

        $newRules = $this->validationRules;
        $newRules['slug'] = ['string', Rule::unique('courses')->ignore($course->id)];
        $data = $request->validate($newRules);

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
