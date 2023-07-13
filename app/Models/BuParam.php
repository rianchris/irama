<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buparam extends Model
{
    public $table = 'bu_params';
    public $guarded = ['id'];
    use HasFactory;

    public function param()
    {
        return $this->belongsTo(Param::class, 'param_id', 'id');
    }
}
