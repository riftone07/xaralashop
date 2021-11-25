<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index()
    {

      $produits = Produit::all();

      return view('index',compact('produits'));

    }


    public function showproduit($slug)
    {

     $produit =  Produit::where('slug',$slug)->first();

      return view('produits.details',compact('produit',));
    }
}

