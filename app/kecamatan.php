<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = [
        'nama', 'user_id', 'long', 'lat'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function desas()
    {
        return $this->hasMany('App\Desa', 'kecamatan_id');
    }

    public function penyalurans()
    {
        return $this->hasMany('App\Penyaluran', 'kecamatan_id');
    }

    protected $table = "kecamatan";
}
