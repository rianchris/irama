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

    public function bu()
    {
        return $this->belongsToMany(Bu::class, 'bu_params', 'badan_usaha_id', 'param_id')->withPivot('skorparam', 'per_inf_d', 'per_inf_w', 'per_inf_k', 'per_inf_o', 'sumberinfo', 'catatan', 'hasilreviu');
    }
}
