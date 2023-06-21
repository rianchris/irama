<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadanUsaha extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    public function myprofile()
    {
        return $this->belongsTo(MyProfile::class, 'my_profile_id');
    }

    public function sima_klpbu()
    {
        return $this->hasOne(Sima_klpbu::class, 'kode_klpbu', 'kode_klpbu_id');
    }

    public function klaster()
    {
        return $this->belongsTo(Klaster::class);
    }

    public function param()
    {
        return $this->belongsToMany(Param::class, 'bu_params', 'badan_usaha_id', 'param_id')->withPivot('skorparam');
    }
}
