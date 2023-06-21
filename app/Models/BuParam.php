<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuParam extends Model
{
    use HasFactory;

    public function filependukung()
    {
        return $this->hasManyThrough(Filependukung::class, 'bu_param_id', 'id');
    }
}
