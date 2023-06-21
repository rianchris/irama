<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sima_klpbu extends Model
{
    use HasFactory;
    protected $connection = 'second_mysql';
    protected $guarded = 'kode_klpbu';
    protected $table = 'sima_klpbu';
    protected $primaryKey = 'kode_klpbu';
    public $incrementing = false;


    public function badanusaha()
    {
        return $this->belongsTo(BadanUsaha::class, 'kode_klpbu', 'kode_klpbu_id');
    }
    // public function myprofile()
    // {
    //     return $this->hasOne(MyProfile::class, 'kode_klpbu_id', 'kode_klpbu');
    // }
}
