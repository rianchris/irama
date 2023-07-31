<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    public function bu()
    {
        return $this->belongsToMany(Bu::class, 'bu_datas', 'bu_id', 'data_id')->withPivot('link', 'catatan');
    }
}
