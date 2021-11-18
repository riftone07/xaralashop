<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

      $categories =  Categorie::all();

      $produits = Produit::all();


        return view('index',compact('categories','produits'));

    }
}
