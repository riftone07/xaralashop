<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    public function callback()
    {
        try {
            //Prenez votre MasterKey, hashez la et comparez le résultat au hash reçu par IPN
            if($_POST['data']['hash'] === hash('sha512', env("P_MasterKey"))) {

                if ($_POST['data']['status'] == "completed") {
                    $referencecommande = $_POST['data']['custom_data']['reference_commande'];

                    $commande = Commande::where('reference',$referencecommande)->first();

                    $commande->status = "Paiement Effectué avec paydunya";

                    $commande->save();
                    //Faites vos traitements backoffice ici...
                }

            } else {
                die("Cette requête n'a pas été émise par PayDunya");
            }
        } catch(Exception $e) {
            die();
        }

    }
}
