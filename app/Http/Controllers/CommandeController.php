<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use App\Notifications\NouvelCommande;
use Illuminate\Http\Request;
use Cart;
use Auth;
use Illuminate\Support\Facades\Notification;

class CommandeController extends Controller
{

    public function passeralacaisse()
    {
        return view("commandes.index");
    }

    public function passeralachaisse(Request $request)
    {
        $this->validate($request,[
            'adresse_de_livraison' => 'required|string|max:150'
        ]);

        $paniers = Cart::getContent();

        $commande = new Commande();

        $commande->reference = rand(1000000,9000000);

        $commande->total = Cart::getTotal();

        $commande->user_id = Auth::user()->id;

        $commande->adresse_de_livraison = $request->adresse_de_livraison;

        $commande->save();

        foreach ($paniers as $panier){

            $commande->produits()->attach($panier->id,
                [
                    'quantite' => $panier->quantity,
                    'prix' => $panier->price,
                    'option' => $panier->attributes->option_id,
                ]
            );

            $produit = Produit::find($panier->id);

            $produit->quantite -= $panier->quantity;
        }


        Cart::clear();

        if ($request->type_de_paiement == "livraison"){

            $admin = User::where('role','admin')->get();
            Notification::send($admin, new NouvelCommande());

            return redirect()->route('confirmation');
        }else{
            return redirect()->route('paiementenligne.index',$commande->reference);
        }


    }

    public function confirmation()
    {
        return view("commandes.confirmation");
    }
}
