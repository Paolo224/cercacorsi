<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AssegnazioneAziendeAiGestori;
use App\Models\User;
use Illuminate\Http\Request;

class SegretariaController extends Controller
{
    public function eliminaUtente(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);

        if ($user) {
            $user->delete();

            // Elimina le aziende assegnate
            AssegnazioneAziendeAiGestori::where('id_gestore', $userId)->delete();

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
