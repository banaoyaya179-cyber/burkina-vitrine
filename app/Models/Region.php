<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'slug', 'nom', 'ancien_nom', 'chef_lieu', 'zone', 'slogan',
        'superficie', 'population', 'densite', 'climat', 'vegetation',
        'description', 'histoire', 'langues', 'peuples', 'voisins',
        'image_hero', 'image_card', 'image_mini_carte'
    ];

    protected $casts = [
        'langues' => 'array',
        'peuples' => 'array',
        'voisins' => 'array',
    ];

    public function provinces() {
        return $this->hasMany(Province::class);
    }

    public function sites() {
        return $this->hasMany(SiteTouristique::class);
    }

    public function festivals() {
        return $this->hasMany(Festival::class);
    }

    public function galerie() {
        return $this->hasMany(Galerie::class);
    }
    
    public function richesses() {
    return $this->hasMany(Richesse::class);
    }
}
