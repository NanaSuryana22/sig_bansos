<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    protected $fillable = [
        'judul_laporan', 'user_id', 'kecamatan_id', 'desa_id', 'alamat', 'long', 'lat',
        'image_1', 'image_2', 'image_3', 'desciption', 'status_desa', 'keterangan_desa',
        'phone_number', 'status_kecamatan', 'status_kemensos', 'keterangan_kecamatan', 'keterangan_kemensos'
    ];

    public $appends = [
        'coordinate', 'map_popup_laporan', 'popup_laporan_kecamatan', 'popup_laporan_desa',
        'map_popup_pelaporan', 'map_popup_content'
    ];

    public function getCoordinateAttribute()
    {
        if ($this->lat && $this->long) {
            return $this->lat.', '.$this->long;
        }
    }

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'judul_laporan' => $this->judul_laporan, 'type' => __('pelaporan.pelaporan'),
        ]);
        $link = '<a href="'.route('laporan_tingkat_kemensos.show', $this).'"';
        $link .= ' title="Lihat Detail Laporan Ini ?">';
        $link .= 'Klik Disini';
        $link .= '</a>';

        return $link;
    }

    public function getShowKecamatanAttribute()
    {
        $title = __('app.show_detail_title', [
            'judul_laporan' => $this->judul_laporan, 'type' => __('pelaporan.pelaporan'),
        ]);
        $link = '<a href="'.route('laporan_tingkat_kecamatan.show', $this).'"';
        $link .= ' title="Lihat Detail Laporan Ini ?">';
        $link .= 'Klik Disini';
        $link .= '</a>';

        return $link;
    }

    public function getPopupLaporanKecamatanAttribute()
    {
        $PopupLaporanKecamatan = '';
        $PopupLaporanKecamatan .= '<div class="my-2"><strong>Judul Laporan:</strong><br>'.$this->judul_laporan.'</div>';
        $PopupLaporanKecamatan .= '<div class="my-2"><strong>Dibuat Oleh:</strong><br>'.$this->user->name.'</div>';
        $PopupLaporanKecamatan .= '<div class="my-2"><strong>Titik Koordinat:</strong><br>'.$this->coordinate.'</div>';
        $PopupLaporanKecamatan .= '<div class="my-2"><strong>Lihat Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'">Klik Disini</a></div>';
        $PopupLaporanKecamatan .= '<div class="my-2"><strong>Lihat Lebih Detail:</strong><br>'.$this->show_kecamatan.'</div>';

        return $PopupLaporanKecamatan;
    }

    public function getShowDesaAttribute()
    {
        $title = __('app.show_detail_title', [
            'judul_laporan' => $this->judul_laporan, 'type' => __('pelaporan.pelaporan'),
        ]);
        $link = '<a href="'.route('laporan_tingkat_desa.show', $this).'"';
        $link .= ' title="Lihat Detail Laporan Ini ?">';
        $link .= 'Klik Disini';
        $link .= '</a>';

        return $link;
    }

    public function getPopupLaporanDesaAttribute()
    {
        $PopupLaporanDesa = '';
        $PopupLaporanDesa .= '<div class="my-2"><strong>Judul Laporan:</strong><br>'.$this->judul_laporan.'</div>';
        $PopupLaporanDesa .= '<div class="my-2"><strong>Dibuat Oleh:</strong><br>'.$this->user->name.'</div>';
        $PopupLaporanDesa .= '<div class="my-2"><strong>Titik Koordinat:</strong><br>'.$this->coordinate.'</div>';
        $PopupLaporanDesa .= '<div class="my-2"><strong>Lihat Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'">Klik Disini</a></div>';
        $PopupLaporanDesa .= '<div class="my-2"><strong>Lihat Lebih Detail:</strong><br>'.$this->show_desa.'</div>';

        return $PopupLaporanDesa;
    }

    public function getMapPopupLaporanAttribute()
    {
        $mapPopupLaporan = '';
        $mapPopupLaporan .= '<div class="my-2"><strong>Judul Laporan:</strong><br>'.$this->judul_laporan.'</div>';
        $mapPopupLaporan .= '<div class="my-2"><strong>Dibuat Oleh:</strong><br>'.$this->user->name.'</div>';
        $mapPopupLaporan .= '<div class="my-2"><strong>Titik Koordinat:</strong><br>'.$this->coordinate.'</div>';
        $mapPopupLaporan .= '<div class="my-2"><strong>Lihat Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'">Klik Disini</a></div>';
        $mapPopupLaporan .= '<div class="my-2"><strong>Lihat Lebih Detail:</strong><br>'.$this->name_link.'</div>';

        return $mapPopupLaporan;
    }

    public function getShowPelaporanAttribute()
    {
        $title = __('app.show_detail_title', [
            'judul_laporan' => $this->judul_laporan, 'type' => __('pelaporan.pelaporan'),
        ]);
        $link = '<a href="'.route('pelaporan.show', $this).'"';
        $link .= ' title="Lihat Detail Laporan Ini ?">';
        $link .= 'Klik Disini';
        $link .= '</a>';

        return $link;
    }

    public function getMapPopupPelaporanAttribute()
    {
        $mapPopupPelaporan = '';
        $mapPopupPelaporan .= '<div class="my-2"><strong>Judul Laporan:</strong><br>'.$this->judul_laporan.'</div>';
        $mapPopupPelaporan .= '<div class="my-2"><strong>Dibuat Oleh:</strong><br>'.$this->user->name.'</div>';
        $mapPopupPelaporan .= '<div class="my-2"><strong>Titik Koordinat:</strong><br>'.$this->coordinate.'</div>';
        $mapPopupPelaporan .= '<div class="my-2"><strong>Lihat Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'">Klik Disini</a></div>';
        $mapPopupPelaporan .= '<div class="my-2"><strong>Lihat Lebih Detail:</strong><br>'.$this->show_pelaporan.'</div>';

        return $mapPopupPelaporan;
    }

    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>Judul Laporan:</strong><br>'.$this->judul_laporan.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Dibuat Oleh:</strong><br>'.$this->user->name.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Kecamatan:</strong><br>'.$this->kecamatan->nama.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Desa:</strong><br>'.$this->desa->nama_desa.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>Buka Lokasi Di Google Maps:</strong><br><a href="https://www.google.com/maps/search/'.$this->coordinate.'">Klik Disini</a></div>';

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
