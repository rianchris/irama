<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimensi extends Model
{
    use HasFactory;
    public function param()
    {
        return $this->hasMany(Param::class, 'dimensi_id');
    }
}
