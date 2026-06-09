<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'region_id', 'nom', 'chef_lieu', 'superficie', 'population', 'description'
    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
