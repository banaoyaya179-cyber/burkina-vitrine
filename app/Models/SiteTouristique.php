<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteTouristique extends Model
{
    protected $table = 'sites_touristiques';

    protected $fillable = [
        'region_id', 'nom', 'description', 'importance', 'image'
    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
