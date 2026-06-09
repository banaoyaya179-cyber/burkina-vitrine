<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = [
        'region_id', 'nom', 'periode', 'description', 'type'
    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
