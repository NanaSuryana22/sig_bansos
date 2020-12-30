<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    protected $fillable = [
        'judul_laporan', 'user_id', 'kecamatan_id', 'desa_id', 'alamat', 'long', 'lat',
        'image_1', 'image_2', 'image_3', 'desciption', 'status', 'keterangan'
    ];

    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    public function getCoordinateAttribute()
    {
        if ($this->lat && $this->long) {
            return $this->lat.', '.$this->long;
        }
    }

    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>Judul Laporan:</strong><br>'.$this->judul_laporan.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Nama Pelapor:</strong><br>'.$this->user->name.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Titik Koordinat:</strong><br>'.$this->coordinate.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Lihat Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'">Klik Disini</a></div>';

        return $mapPopupContent;
    }

    protected $table = "pelaporan";

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id');
    }

    public function desa()
    {
        return $this->belongsTo('App\Desa', 'desa_id');
    }
}
