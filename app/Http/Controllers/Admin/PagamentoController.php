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

        //dd($response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return "PAGAMENTO AVVENUTO";
        } else {
            return redirect()->route('admin.pagamento-rifiutato');
        }
    }

    public function rifiutato(Request $request)
    {
        return "PAGAMENTO NON AVVENUTO";
    }
}
