<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = [
        'nama', 'user_id', 'long', 'lat'
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
        $mapPopupContent .= '<div class="my-2"><strong>Nama Kecamatan:</strong><br>'.$this->nama.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Titik Koordinat:</strong><br>'.$this->coordinate.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Lihat Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'" target="_blank">Klik Disini</a></div>';

        return $mapPopupContent;
    }

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

    public function pelaporans()
    {
        return $this->hasMany('App\Pelaporan', 'kecamatan_id');
    }

    protected $table = "kecamatan";
}
