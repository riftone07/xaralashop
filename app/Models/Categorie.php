<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Categorie extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;



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

    public function imagePrincile()
    {
        return asset('storage/categories'.$this->image);
    }

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
