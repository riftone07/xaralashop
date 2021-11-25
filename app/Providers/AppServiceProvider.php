<?php

namespace App\Providers;

use App\Models\Categorie;
use Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'],function($view){
            $view->with([
                'nombredeproduit' => Cart::getTotalQuantity(),
                'totalpanier' => Cart::getTotal(),
                'paniers' => Cart::getContent(),
                "categories_all" =>  Categorie::all()
            ]);
        });
    }
}
