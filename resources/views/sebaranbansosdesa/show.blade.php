@extends('grid.master')
@section('title', 'Informasi Penyaluran')
@section('content')
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="panel-heading">
          <ul class="nav nav-tabs nav-justified">
            <li class="active">
              <a data-toggle="tab" href="#laporan">Informasi Penyaluran</a>
            </li>
          </ul>
        </div>
        <!-- /panel-heading -->
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
                    <dt class="col-sm-4">Nama Bantuan</dt>
                    <dd class="col-sm-8">{{ $penyaluran->bantuan->nama_bantuan }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Nama Desa</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->desa->nama_desa) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Jumlah Penyaluran</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->quota) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Status Penyaluran</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->status_tracking_kecamatan) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Keterangan</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->keterangan_kemensos) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                  </dl>
                </div>
                <!-- /col-md-6 -->
                <div class="col-md-12 jarak-laporan">
                  <div class="row">
                    <dl class="row">
                      <dt class="col-sm-4">Titik Koordinat Kecamatan Longitude</dt>
                      <dd class="col-sm-8">{{ ucfirst($penyaluran->kecamatan->long) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Titik Koordinat Kecamatan Latitude</dt>
                      <dd class="col-sm-8">{{ ucfirst($penyaluran->kecamatan->lat) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Lihat Lokasi di Google Maps</dt>
                      <dd class="col-sm-8"><a href="https://www.google.com/maps/search/{{ $penyaluran->coordinate }}" target="_blank">Klik Disini</a></dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
              <!-- /row -->
              @if(Auth::user()->roles[0]->name == 'dinas_sosial' || Auth::user()->roles[0]->name == 'kecamatan' || Auth::user()->roles[0]->name == 'desa')
                <a href="{{ route('warga_penerima_bansos',$penyaluran->id) }}" class="pull-left btn btn-warning btn-md">
                  <i class="fa fa-table" title="Lihat Data Warga Penerima Bantuan Ini ?"></i>
                </a>
              @endif
              <a href="{{ url()->previous() }}" class="pull-right btn btn-primary btn-md">
                <i class="fa fa-mail-reply" title="Kembali"></i>
              </a>
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
    #mapid { height: 300px; }
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
<!-- Make sure you put this AFTER Leaflets CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $penyaluran->desa->lat }}, {{ $penyaluran->desa->long }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $penyaluran->desa->lat }}, {{ $penyaluran->desa->long }}]).addTo(map)
        .bindPopup('{!! $penyaluran->map_popup_konten !!}');
</script>
@endpush