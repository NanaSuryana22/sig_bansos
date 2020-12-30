<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = [
        'penyaluran_id', 'nik', 'nama', 'jenis_kelamin', 'tempat_tanggal_lahir', 'alamat',
        'agama', 'status_pernikahan', 'pekerjaan'
    ];

    public function penyaluran()
    {
        return $this->belongsTo('App\Penyaluran', 'penyaluran_id');
    }

    protected $table = "penduduk";
}
