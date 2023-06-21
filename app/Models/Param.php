<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use HasFactory;

    public function deskripsiskor()
    {
        return $this->hasMany(Deskripsiskor::class);
    }

    public function badanusaha()
    {
        return $this->belongsToMany(BadanUsaha::class, 'bu_params', 'badan_usaha_id', 'param_id')->withPivot('skorparam');
    }
}
