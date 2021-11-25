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
Route::get('/', [WelcomeController::class, 'index']);

Route::get('produits/{slug}',[WelcomeController::class,'showproduit'])->name('showproduit');


Route::resource('panier',PanierController::class);

Route::get('passer-a-la-caisse',[\App\Http\Controllers\CommandeController::class,'passeralacaisse'])->name("passeralacaisse")->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
