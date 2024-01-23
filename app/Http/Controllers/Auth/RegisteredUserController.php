<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'nome' => ['required', 'string', 'max:255'],
                'cognome' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'id_admin' => ['nullable']
            ],
            [
                'nome.required' => 'Inserisci il tuo nome.',
                'nome.string' => 'Il nome deve essere una stringa.',
                'nome.max' => 'Il nome deve essere massimo di :max caratteri.',
                'cognome.required' => 'Inserisci il tuo cognome.',
                'cognome.string' => 'Il cognome deve essere una stringa.',
                'cognome.max' => 'Il cognome deve essere massimo di :max caratteri.',
                'email.required' => 'Inserisci la tua mail.',
                'email.email' => 'Il campo inserito non è una mail valida.',
                'email.string' => 'L\'email deve essere una stringa.',
                'email.lowercase' => 'L\'email deve essere scritta tutta in minuscolo.',
                'email.max' => 'La mail deve essere massimo di :max caratteri.',
                'email.unique' => 'La mail è già registrata nei nostri sistemi.',
                'password.confirmed' => 'Conferma la tua password.',
                'password.min' => 'La password deve essere lunga minimo :min caratteri.',
                'password.required' => 'Inserisci obbligatoriamente la passoword.',
            ]
        );
        //dd($request);
        $user = User::create([
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'saldo' => 0,
            'id_admin' => $request->id_admin == null ? 0 : $request->id_admin
        ]);

        event(new Registered($user));


        if ($request->id_admin == null) {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } else {
            return redirect(RouteServiceProvider::REGISTRAZIONESEGRETARIA)->with('message', "$request->nome $request->cognome è ora un gestore di");
        }
    }
}
