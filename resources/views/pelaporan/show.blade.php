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
                      <dd class="col-sm-8">{{ ucfirst($pelaporan->status) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      <dt class="col-sm-4">Keterangan</dt>
                      <dd class="col-sm-8">{{ ucfirst($pelaporan->keterangan) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                    </dl>
                  </div>
                </div>
              </div>
              @if(Auth::user()->roles[0]->name == 'masyarakat')
                <br />
                <form action="{{ route('pelaporan.destroy', $pelaporan->id) }}" method="post">
                  <a href="{{ route('pelaporan.edit',$pelaporan->id) }}" class="pull-left btn btn-warning btn-md">
                    <i class="fa fa-pencil" title="Ubah Data"></i>
                  </a>
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="pull-left btn btn-danger btn-md btn-bantuan" onclick="return confirm('Yakin ingin menghapus Laporan Ini ?')">
                    <i class="fa fa-trash" title="Hapus Data"></i>
                  </button>
                  <a href="{{ route('pelaporan.index')  }}" class="pull-right btn btn-primary btn-md">
                  <i class="fa fa-mail-reply" title="Kembali"></i>
                  </a>
                </form>
              @elseif(Auth::user()->roles[0]->name == 'desa')
                <br />
                <a href="{{ route('list_pelaporan_desa')  }}" class="pull-right btn btn-primary btn-md">
                <i class="fa fa-mail-reply" title="Kembali"></i>
                </a>
              @endif
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