<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = [
        'nama_desa', 'kecamatan_id', 'user_id', 'alamat', 'long', 'lat', 'deskripsi'
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
        $mapPopupContent .= '<div class="my-2"><strong>Nama Desa:</strong><br>'.$this->nama_desa.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Titik Koordinat:</strong><br>'.$this->coordinate.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Lihat Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'" target="_blank">Klik Disini</a></div>';

        return $mapPopupContent;
    }

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

    public function pelaporans()
    {
        return $this->hasMany('App\Pelaporan', 'desa_id');
    }

    protected $table = "desa";
}
