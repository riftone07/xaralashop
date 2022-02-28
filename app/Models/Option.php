<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = "options";

    protected $fillable = [
        'libelle'
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class,'option_produit');
    }
}
