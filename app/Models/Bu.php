<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    public function myprofileMitra()
    {
        return $this->belongsTo(Myprofile::class, 'myprofile_mitra_id', 'id');
    }

    public function myprofileWarga()
    {
        return $this->belongsTo(Myprofile::class, 'myprofile_warga_id', 'id');
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
        return $this->belongsToMany(Param::class, 'bu_params', 'bu_id', 'param_id')->withPivot('tahun', 'skor_mitra', 'skor_warga', 'per_inf_d', 'per_inf_w', 'per_inf_k', 'per_inf_o', 'sumberinfo', 'catatan', 'hasilreviu');
    }

    public function data()
    {
        return $this->belongsToMany(Data::class, 'bu_datas', 'bu_id', 'data_id')->withPivot('tahun', 'link', 'catatan');
    }
}
