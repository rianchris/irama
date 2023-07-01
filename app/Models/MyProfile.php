<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myprofile extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    // protected $connection = 'mysql';
    // protected $with = ['user', 'badanusaha'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bu()
    {
        return $this->hasOne(Bu::class);
    }

    public function ref_peg_data()
    {
        return $this->hasOne(Ref_peg_data::class, 'warga_id', 'nip');
    }
}
