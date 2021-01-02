@extends('grid.master')
@section('title', 'Informasi Detail Pelaporan')
@section('content')
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="panel-heading">
          <ul class="nav nav-tabs nav-justified">
            <li class="active">
              <a data-toggle="tab" href="#laporan">Informasi Detail Laporan</a>
            </li>
          </ul>
        </div>
        <!-- /panel-heading -->
        <div class="col-lg-12">
          @include('grid.notice')
        </div>
        <div class="panel-body">
          <div class="tab-content">
            <!-- /tab-pane -->
            <div id="laporan">
              <div class="row">
                <div class="col-md-6 detailed">
                  <div id="mapid"></div>
                </div>
                <!-- /col-md-6 -->
                <br />
                <div class="col-md-6 detailed">
                  <dl class="row">
                    <dt class="col-sm-4">Judul Laporan</dt>
                    <dd class="col-sm-8">{{ $pelaporan->judul_laporan }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Nama Pelapor</dt>
                    <dd class="col-sm-8">{{ ucfirst($pelaporan->user->name) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Kecamatan</dt>
                    <dd class="col-sm-8">{{ ucfirst($pelaporan->kecamatan->nama) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Desa / Kelurahan</dt>
                    <dd class="col-sm-8">{{ ucfirst($pelaporan->desa->nama_desa) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Alamat / Patokan Lokasi</dt>
                    <dd class="col-sm-8">{{ ucfirst($pelaporan->alamat) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                  </dl>
                </div>
                <!-- /col-md-6 -->
                <div class="col-md-12 jarak-laporan">
                  <div class="row">
                    <dl class="row">
                      <dt class="col-sm-4">Nomor Handphone Yang Dapat Dihubungi</dt>
                      <dd class="col-sm-8"><a href="tel:{{ $pelaporan->phone_number }}">{{ $pelaporan->phone_number }}</a></dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Titik Koordinat Longitude</dt>
                      <dd class="col-sm-8">{{ ucfirst($pelaporan->long) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Titik Koordinat Latitude</dt>
                      <dd class="col-sm-8">{{ ucfirst($pelaporan->lat) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Lihat Lokasi di Google Maps</dt>
                      <dd class="col-sm-8"><a href="https://www.google.com/maps/search/{{ $pelaporan->lat }}, {{ $pelaporan->long }}" target="_blank">Klik Disini</a></dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Lihat Gambar Pendukung</dt>
                      <dd class="col-sm-8">
                        <button class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
                          Lihat Gambar
                        </button>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          @include('pelaporan.gambar_pelaporan')
                        </div>
                      </dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Uraian Deskripsi</dt>
                      <dd class="col-sm-8">{{ ucfirst($pelaporan->desciption) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Status Laporan</dt>
                      @if($pelaporan->status_kecamatan == NULL && $pelaporan->status_kemensos == NULL)
                        <dd class="col-sm-8">{{ ucfirst($pelaporan->status_desa) }}</dd>
                      @elseif ($pelaporan->status_kecamatan != NULL && $pelaporan->status_kemensos == NULL)
                        <dd class="col-sm-8">{{ ucfirst($pelaporan->status_kecamatan) }}</dd>
                      @elseif ($pelaporan->status_kecamatan != NULL && $pelaporan->status_kemensos != NULL)
                        <dd class="col-sm-8">{{ ucfirst($pelaporan->status_kemensos) }}</dd>
                      @endif
                      <div class="col-md-12">
                        <hr />
                      </div>
                      @if($pelaporan->keterangan_desa != NULL && $pelaporan->keterangan_kecamatan == NULL && $pelaporan->keterangan_kemensos == NULL)
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-8">{{ ucfirst($pelaporan->keterangan_desa) }}</dd>
                        <div class="col-md-12">
                          <hr />
                      @elseif($pelaporan->keterangan_desa != NULL && $pelaporan->keterangan_kecamatan != NULL && $pelaporan->keterangan_kemensos == NULL)
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-8">{{ ucfirst($pelaporan->keterangan_kecamatan) }}</dd>
                        <div class="col-md-12">
                          <hr />
                      @elseif($pelaporan->keterangan_desa != NULL && $pelaporan->keterangan_kecamatan != NULL && $pelaporan->keterangan_kemensos != NULL)
                        <dt class="col-sm-4">Keterangan</dt>
                        <dd class="col-sm-8">{{ ucfirst($pelaporan->keterangan_kemensos) }}</dd>
                        <div class="col-md-12">
                          <hr />
                      @endif
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
              @if ($pelaporan->status_desa == 'Diteruskan Ke Tingkat Kecamatan' && $pelaporan->status_kecamatan == NULL && $pelaporan->kecamatan_id == $kecamatan_user[0])
                <button class="btn btn-warning btn-md" title="Tindak Lanjut Laporan Ini ?" data-toggle="modal" data-target="#approval_kecamatan">
                  <i class="fa fa-check"></i>
                </button>
                @include('laporan_tingkat_kecamatan.approval_kecamatan')
              @endif
              <a href="{{ route('laporan_tingkat_kecamatan.index')  }}" class="pull-right btn btn-primary btn-md">
                <i class="fa fa-mail-reply" title="Kembali"></i>
              </a>
              <!-- /row -->
            </div>
            <!-- /tab-pane -->
          </div>
          <!-- /tab-content -->
        </div>
        <!-- /panel-body -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /container -->
  </section>
  <!-- /wrapper -->
</section>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 350px; }
</style>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 400px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $pelaporan->lat }}, {{ $pelaporan->long }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $pelaporan->lat }}, {{ $pelaporan->long }}]).addTo(map)
        .bindPopup('{!! $pelaporan->map_popup_content !!}');
</script>
@endpush