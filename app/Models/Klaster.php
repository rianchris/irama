<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klaster extends Model
{
    use HasFactory;

    public function bu()
    {
        return $this->hasMany(Bu::class, 'klaster_id', 'id');
    }
}
