<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gastronomie extends Model
{
    protected $table = 'gastronomie';

    protected $fillable = [
        'region_id', 'nom', 'description', 'type', 'image'
    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
