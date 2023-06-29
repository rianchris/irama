<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    public function deskripsiskor()
    {
        return $this->hasMany(Deskripsiskor::class);
    }

    public function bu()
    {
        return $this->belongsToMany(Bu::class, 'bu_params', 'bu_id', 'param_id')->withPivot('skorparam', 'per_inf_d', 'per_inf_w', 'per_inf_k', 'per_inf_o', 'filepdf', 'filedocx', 'filexlsx', 'sumberinfo', 'catatan', 'hasilreviu');
    }

    public function dimensi()
    {
        return $this->belongsTo(Dimensi::class);
    }
}
