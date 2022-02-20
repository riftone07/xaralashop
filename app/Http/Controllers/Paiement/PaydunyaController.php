<?php

namespace App\Http\Controllers\Paiement;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaydunyaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|string|min:2'
        ]);
        $commande = Commande::where('reference',$request->reference)->first();

        if (empty($commande))
        {
            return back()->with('message','Commande introuvable');
        }

        // configuiration de paydunya

        $baseUrl = "https://xaralashop.test/";

        \Paydunya\Setup::setMasterKey(env('P_MasterKey'));
        \Paydunya\Setup::setPublicKey(env("P_PublicKey_T"));
        \Paydunya\Setup::setPrivateKey(env("P_PrivateKey_T"));
        \Paydunya\Setup::setToken(env("P_Token_T"));
        \Paydunya\Setup::setMode(env("P_mode"));

        //Configuration des informations de votre service/entreprise
        \Paydunya\Checkout\Store::setName("Xarala Shop"); // Seul le nom est requis
        \Paydunya\Checkout\Store::setTagline("Rendez vous au sommet");
        \Paydunya\Checkout\Store::setPhoneNumber("770000000");
        \Paydunya\Checkout\Store::setPostalAddress("Dakar senegal");
        \Paydunya\Checkout\Store::setWebsiteUrl("https://www.xarala.co");
        \Paydunya\Checkout\Store::setLogoUrl("https://www.xarala.co/static/img/logo.44106e02b8a2.png");

        \Paydunya\Checkout\Store::setCallbackUrl($baseUrl."api/paydunya/callback");

        // Cas d'une installation via Composer
        \Paydunya\Checkout\Store::setCancelUrl($baseUrl."paiement/annule");

        \Paydunya\Checkout\Store::setReturnUrl($baseUrl."paiement/success");


        $invoice = new \Paydunya\Checkout\CheckoutInvoice();

        $nom_facture = "Commande #$commande->reference";

        $prixunitaire = $commande->total ;

        $quantite = 1;

        $prixtotal = $prixunitaire * $quantite;

        $invoice->addItem($nom_facture, $quantite, $prixunitaire, $prixtotal, "Commande passé sur xaralashop");

        $invoice->setTotalAmount($prixtotal);

        $invoice->addCustomData("reference_commande", $commande->reference);

        if($invoice->create()) {
            $url_facture = $invoice->getInvoiceUrl();

            return Redirect::to($url_facture);
        }else{
            echo $invoice->response_text;
        }



    }
}
