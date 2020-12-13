<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = [
        'nama_desa', 'kecamatan_id', 'user_id', 'alamat', 'long', 'lat', 'deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id');
    }

    public function penyalurans()
    {
        return $this->hasMany('App\Penyaluran', 'desa_id');
    }

    protected $table = "desa";
}
