<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaiementController extends Controller
{
    public function index($reference)
    {
        $commande = Commande::where('reference',$reference)->first();
        if (empty($commande)){
            return redirect('/');
        }
        return view('paiements.index',compact('commande'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'reference' => 'required|string|max:150'
        ]);


        $commande = Commande::where('reference',$request->reference)->first();
        if (empty($commande)){
            return redirect('/');
        }

        $baseUrl = "http://xarala.xeuweul.com";


        \Paydunya\Setup::setMasterKey(env("P_MasterKey"));
        \Paydunya\Setup::setPublicKey(env("P_PublicKey_T"));
        \Paydunya\Setup::setPrivateKey(env("P_PrivateKey_T"));
        \Paydunya\Setup::setToken(env("P_Token_T"));
        \Paydunya\Setup::setMode(env("P_mode")); // Optionnel en mode test. Utilisez cette option pour les paiements tests.


        //Configuration des informations de votre service/entreprise

        \Paydunya\Checkout\Store::setName("Xaralashop"); // Seul le nom est requis
        \Paydunya\Checkout\Store::setTagline("Boutique en ligne de xarala");
        \Paydunya\Checkout\Store::setPhoneNumber("77000000");
        \Paydunya\Checkout\Store::setPostalAddress("Dakar Plateau");
        \Paydunya\Checkout\Store::setWebsiteUrl("https://www.xarala.co");
        \Paydunya\Checkout\Store::setLogoUrl("https://www.xarala.co/static/img/logo.18ecbe0c3281.png");

        //url de redirection
        \Paydunya\Checkout\Store::setCancelUrl($baseUrl.'/paydunya/cancel');
        \Paydunya\Checkout\Store::setReturnUrl($baseUrl.'/paydunya/success');

        //callbackk
      //  \Paydunya\Checkout\Store::setCallbackUrl($baseUrl.'/api/paydunya/callback');

        //Creatioon de la facture
        $invoice = new \Paydunya\Checkout\CheckoutInvoice();

        $nom_invoice = "Commande #$commande->reference";

        $prixunitaire = $commande->total;

        $quantite = 1;

        $prixtotal = $prixunitaire * $quantite;

        $invoice->addItem($nom_invoice, $quantite, $prixunitaire, $prixtotal, "Commande passer sur la boutique xarala ");

        //le montant que le client payera avec paydunya
        $invoice->setTotalAmount($prixtotal);

        //aajout de la reference de la commande

        $invoice->addCustomData("reference_commande",$commande->reference);


        if($invoice->create()) {
            $url_facture = $invoice->getInvoiceUrl();
            return Redirect::to($url_facture);
        }else{
            echo $invoice->response_text;

        }

    }
}
