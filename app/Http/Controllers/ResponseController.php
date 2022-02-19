<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class ResponseController extends Controller
{

    public function success()
    {
        return view('paiements.success');
    }

    public function cancel()
    {
        return view('paiements.cancel');
    }
}
