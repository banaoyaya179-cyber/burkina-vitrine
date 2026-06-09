<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Richesse extends Model
{
    protected $fillable = ['region_id', 'categorie', 'icon', 'items'];

    protected $casts = ['items' => 'array'];

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
