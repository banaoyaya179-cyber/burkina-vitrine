<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    protected $table = 'galerie';

    protected $fillable = [
        'region_id', 'src', 'alt', 'titre'
    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
