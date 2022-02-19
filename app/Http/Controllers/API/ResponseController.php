<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResponseController extends Controller
{
    public function callback(Request $request)
    {
        Log::info("paiement avec paydunya test");

        try {
            //Prenez votre MasterKey, hashez la et comparez le résultat au hash reçu par IPN
            if($_POST['data']['hash'] === hash('sha512', env("P_MasterKey"))) {

                if ($_POST['data']['status'] == "completed") {

                    $reference = $_POST['data']['custom_data']['reference_commande'];

                    $commande = Commande::whereReference($reference)->first();

                    if (empty($commande)){
                        return redirect()->route('paiements.error');
                    }

                    $commande->status = "Paiement effectué sur paydunya";

                    $commande->save();
                }

            } else {
                die("Cette requête n'a pas été émise par PayDunya");
            }
        } catch(Exception $e) {
            die();
        }

    }
}
