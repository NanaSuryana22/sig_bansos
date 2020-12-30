<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    protected $fillable = [
        'nama_bantuan', 'image', 'quota', 'bantuan_berupa', 'tanggal_dikeluarkan', 'status'
    ];

    public function penyaluran()
    {
        return $this->hasOne('App\Penyaluran', 'bantuan_id');
    }

    protected $table = "bantuan";
}
