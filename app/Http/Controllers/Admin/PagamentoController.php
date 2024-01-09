<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PagamentoController extends Controller
{
    public function pagamento(Request $request)
    {
        // dd($request->prezzo);
        $provider = new PayPalClient;
        $provider->setCurrency('EUR');
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('admin.pagamento-avvenuto'),
                "cancel_url" => route('admin.pagamento-rifiutato'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $request->prezzo
                    ]
                ]
            ]
        ]);
        //dd($response);


        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('admin.pagamento-rifiutato');
        }
    }

    public function avvenuto(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setCurrency('EUR');
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);


        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $user = Auth::user(); // Recupera l'utente autenticato
            $saldo = $user->saldo; // Recupera il saldo dell'utente
            //dd($response['purchase_units'][0]['payments']['captures'][0]['amount']['value']);
            $nuovoSaldo = $saldo + $response['purchase_units'][0]['payments']['captures'][0]['amount']['value']; // Aggiungi 20 al saldo attuale

            // Aggiorna il saldo dell'utente nel modello e salva nel database
            $user->saldo = $nuovoSaldo;
            $user->save();
            $saldoAggiunto = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            return redirect()->route('admin.wallet')->with('message', "$saldoAggiunto € caricati con successo!");
        } else {
            return redirect()->route('admin.pagamento-rifiutato')->with('message', "Non è stato possibile ricaricare il Walllet");
        }
    }

    public function rifiutato(Request $request)
    {
        return view('admin.wallet');
    }
}
