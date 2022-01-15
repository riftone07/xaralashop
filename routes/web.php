<?php

use App\Http\Controllers\PanierController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('index');

});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [WelcomeController::class, 'index']);

Route::get('produits/{slug}',[WelcomeController::class,'showproduit'])->name('showproduit');


Route::resource('panier',PanierController::class);

Route::get('passer-a-la-caisse',[\App\Http\Controllers\CommandeController::class,'passeralacaisse'])->name("passeralacaisse")->middleware('auth');

Route::post('passer-a-la-caisse',[\App\Http\Controllers\CommandeController::class,'passeralachaisse'])->name("passeralacaisse.store")->middleware('auth');

Route::get('confirmation',[\App\Http\Controllers\CommandeController::class,'confirmation'])->name("confirmation")->middleware('auth');

Route::get('paiement-en-ligne/{reference}',[\App\Http\Controllers\PaiementController::class,'index'])->name("paiementenligne.index")->middleware('auth');

Route::post('paiement-en-ligne',[\App\Http\Controllers\PaiementController::class,'store'])->name("paiementenligne.store")->middleware('auth');

