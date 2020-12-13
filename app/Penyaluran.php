<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    protected $fillable = [
        'bantuan_id', 'kecamatan_id', 'desa_id', 'status_tracking_kecamatan',
        'status_tracking_desa', 'keterangan_kemensos', 'keterangan_kecamatan',
        'keterangan_desa', 'quota'
    ];

    public function bantuan()
    {
        return $this->belongsTo('App\Bantuan', 'bantuan_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id');
    }

    public function desa()
    {
        return $this->belongsTo('App\Desa', 'desa_id');
    }

    protected $table = "penyaluran";
}
