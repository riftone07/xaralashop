<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Produit extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = ['nom','description','prix','quantite','actif','image','categorie_id'];


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('icon')
            ->width(50)
            ->height(50)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);

        $this->addMediaConversion('personnaliser')
            ->width(100)
            ->height(100)
            ->sharpen(10);


        $this->addMediaConversion('grande')
            ->width(500)
            ->height(500)
            ->sharpen(10);
    }
    public function categorie()
    {
      return  $this->belongsTo(Categorie::class,'categorie_id');
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class,'commande_produit');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class,'option_produit');
    }
}
