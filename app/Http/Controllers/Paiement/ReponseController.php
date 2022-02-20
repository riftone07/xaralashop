<?php

namespace App\Http\Controllers\Paiement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReponseController extends Controller
{

    public function success()
    {
        return view("paydunya.success");
    }


    public function annule()
    {
        return view("paydunya.annule");
    }
}
