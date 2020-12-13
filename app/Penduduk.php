<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = [
        'user_id', 'alamat', 'latitude', 'longitude', 'jenis_kelamin', 'keterangan'
    ];

    public function user() {
        return $this->hasOne('App\User', 'user_id');
    }

    protected $table = "penduduks";
}
