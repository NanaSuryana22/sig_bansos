<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    protected $fillable = [
        'bantuan_id', 'kecamatan_id', 'desa_id', 'status_tracking_kecamatan',
        'status_tracking_desa', 'keterangan_kemensos', 'keterangan_kecamatan',
        'keterangan_desa', 'quota', 'kec_long', 'kec_lat', 'kel_long', 'kel_lat'
    ];

    public $appends = [
        'coordinate', 'map_popup_content', 'map_popup_konten'
    ];

    public function getCoordinateAttribute()
    {
        if ($this->kecamatan->lat && $this->kecamatan->long) {
            return $this->kecamatan->lat.', '.$this->kecamatan->long;
        }
    }

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'nama_bantuan' => $this->bantuan->nama_bantuan, 'type' => __('penyaluran.penyaluran'),
        ]);
        $link = '<a href="'.route('sebaran_bansos_kecamatan.show', $this).'"';
        $link .= ' title="Lihat Detail Penyaluran Bantuan Ini ?">';
        $link .= 'Klik Disini';
        $link .= '</a>';

        return $link;
    }

    public function getDetailLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'nama_bantuan' => $this->bantuan->nama_bantuan, 'type' => __('penyaluran.penyaluran'),
        ]);
        $link = '<a href="'.route('sebaran_bansos_desa.show', $this).'"';
        $link .= ' title="Lihat Detail Penyaluran Bantuan Ini ?">';
        $link .= 'Klik Disini';
        $link .= '</a>';

        return $link;
    }

    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>Nama Bantuan:</strong><br>'.$this->bantuan->nama_bantuan.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Nama Kecamatan:</strong><br>'.$this->kecamatan->nama.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Jumlah Penyaluran Bantuan:</strong><br>'.$this->quota.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Status:</strong><br>'.$this->status_tracking_kecamatan.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Lihat Lebih Detail:</strong><br>'.$this->name_link.'</div>';

        return $mapPopupContent;
    }

    public function getMapPopupKontenAttribute()
    {
        $mapPopupKonten = '';
        $mapPopupKonten .= '<div class="my-2"><strong>Nama Bantuan:</strong><br>'.$this->bantuan->nama_bantuan.'</div>';
        $mapPopupKonten .= '<div class="my-2"><strong>Nama Desa:</strong><br>'.$this->desa->nama_desa.'</div>';
        $mapPopupKonten .= '<div class="my-2"><strong>Jumlah Penyaluran Bantuan:</strong><br>'.$this->quota.'</div>';
        $mapPopupKonten .= '<div class="my-2"><strong>Status:</strong><br>'.$this->status_tracking_desa.'</div>';
        $mapPopupKonten .= '<div class="my-2"><strong>Lihat Lebih Detail:</strong><br>'.$this->detail_link.'</div>';

        return $mapPopupKonten;
    }

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

    public function penduduks()
    {
        return $this->has_many('App\Penduduk', 'penyaluran_id');
    }

    protected $table = "penyaluran";
}
