<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AssegnazioneAziendeAiGestori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssegnazioneController extends Controller
{
    // public function assegnazione(Request $request)
    // {
    //     $gestoreId = $request->input('id_gestore');
    //     $aziendeSelezionate = $request->input('id_azienda', []);
    //     //dd($gestoreId);
    //     $gestore = User::where('id', $gestoreId)->whereNotNull('id_admin')->first();

    //     if ($gestore) {

    //         if (AssegnazioneAziendeAiGestori::where('id_gestore', $gestoreId)->exists()) {
    //             // Recupera tutte le righe con l'id_gestore corrispondente
    //             $aziendeAssegnate = AssegnazioneAziendeAiGestori::where('id_gestore', $gestoreId)->get();

    //             //dd($aziendeAssegnate);

    //             foreach ($aziendeAssegnate as $azienda) {
    //                 foreach ($aziendeSelezionate as $aziendaId) {
    //                     // Aggiorna solo il campo 'id_azienda'
    //                     $azienda->update([
    //                         'id_azienda' => $aziendaId,
    //                     ]);
    //                 }
    //             }
    //         } else {
    //             // Non ci sono righe con l'id_gestore corrispondente, crea nuove righe
    //             foreach ($aziendeSelezionate as $aziendaId) {
    //                 AssegnazioneAziendeAiGestori::create([
    //                     'id_admin' => Auth::user()->id,
    //                     'id_gestore' => $gestoreId,
    //                     'id_azienda' => $aziendaId,
    //                 ]);
    //             }
    //         }
    //     }

    //     // Altri processi o reindirizzamenti possono essere aggiunti qui

    //     return redirect()->back();
    // }

    public function assegnazione(Request $request)
    {
        $gestoreId = $request->input('id_gestore');
        $aziendeSelezionate = $request->input('id_azienda', []);

        $gestore = User::where('id', $gestoreId)->whereNotNull('id_admin')->first();

        if ($gestore) {
            $query = AssegnazioneAziendeAiGestori::where('id_gestore', $gestoreId);

            if ($query->exists()) {
                // Recupera tutte le righe con l'id_gestore corrispondente
                $aziendeAssegnate = $query->get();

                // Trova le aziende da rimuovere
                $aziendeDaRimuovere = $aziendeAssegnate->pluck('id_azienda')->diff($aziendeSelezionate);

                // Rimuovi le aziende non più selezionate
                AssegnazioneAziendeAiGestori::whereIn('id_azienda', $aziendeDaRimuovere)->delete();

                // Itera sulle aziende selezionate
                foreach ($aziendeSelezionate as $aziendaId) {
                    // Aggiorna o crea la riga
                    AssegnazioneAziendeAiGestori::updateOrCreate(
                        ['id_gestore' => $gestoreId, 'id_azienda' => $aziendaId],
                        ['id_admin' => Auth::user()->id]
                    );
                }
            } else {
                // Non ci sono righe con l'id_gestore corrispondente, crea nuove righe
                foreach ($aziendeSelezionate as $aziendaId) {
                    AssegnazioneAziendeAiGestori::create([
                        'id_admin' => Auth::user()->id,
                        'id_gestore' => $gestoreId,
                        'id_azienda' => $aziendaId,
                    ]);
                }
            }
        }

        // Altri processi o reindirizzamenti possono essere aggiunti qui

        return redirect()->back();
    }
}
