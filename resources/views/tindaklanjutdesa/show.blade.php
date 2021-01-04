@extends('grid.master')
@section('title', 'Informasi Penyaluran Bantuan')
@section('content')
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="row mt">
      <div class="col-lg-12">
        @include('grid.notice')
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="showback">
          <h4><i class="fa fa-map-marker"></i> Peta Tujuan Kecamatan</h4>
            <div id="mapid"></div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="showback">
          <h4><i class="fa fa-map-marker"></i> Peta Tujuan Desa</h4>
            <div id="mapdesa"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="panel-body">
          <div class="tab-content">
            <!-- /tab-pane -->
            <div id="laporan">
              <div class="row">
                <div class="col-md-6 detailed">
                  <br />
                  <img src="{{ url($penyaluran->bantuan->image) }}" alt="..." class="img-thumbnail">
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
                    <dt class="col-sm-4">Jumlah Penyaluran</dt>
                    <dd class="col-sm-8">{{ $penyaluran->quota }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Tujuan Kecamatan</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->kecamatan->nama) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Tujuan Desa</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->desa->nama_desa) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Status Penyaluran Kecamatan</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->status_tracking_kecamatan) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                    <dt class="col-sm-4">Status Penyaluran Desa</dt>
                    <dd class="col-sm-8">{{ ucfirst($penyaluran->status_tracking_desa) }}</dd>
                    <div class="col-md-12">
                      <hr />
                    </div>
                  </dl>
                </div>
                <!-- /col-md-6 -->
                <div class="col-md-12 jarak-laporan">
                  <br />
                  <div class="row">
                    <dl class="row">
                      <dt class="col-sm-4">Keterangan Dari Dinas Sosial</dt>
                      <dd class="col-sm-8">{{ ucfirst($penyaluran->keterangan_kemensos) }}</dd>
                      <div class="col-md-12">
                        <hr />
                      </div>
                      @isset($penyaluran->keterangan_kecamatan)
                        <dt class="col-sm-4">Keterangan Dari Petugas Kecamatan</dt>
                        <dd class="col-sm-8">{{ ucfirst($penyaluran->keterangan_kecamatan) }}</dd>
                        <div class="col-md-12">
                          <hr />
                        </div>
                      @endisset
                      @isset($penyaluran->keterangan_desa)
                        <dt class="col-sm-4">Keterangan Dari Petugas Desa</dt>
                        <dd class="col-sm-8">{{ ucfirst($penyaluran->keterangan_desa) }}</dd>
                        <div class="col-md-12">
                          <hr />
                        </div>
                      @endisset
                    </dl>
                  </div>
                </div>
              </div>
              <br />
              <a href="{{ route('penduduk.show',$penyaluran->id) }}" class="btn-show-list-penduduk pull-left btn btn-success btn-md">
                <i class="fa fa-table" title="Lihat Data Warga Penerima Bantuan Ini ?"></i>
              </a>
              @if($penyaluran->status_tracking_desa == 'Dalam Proses' && $penyaluran->status_tracking_kecamatan == 'Diterima' && $penyaluran->desa_id == $desa_id[0])
                <button class="btn btn-warning btn-md" title="Verifikasi Penyaluran Ini ?" data-toggle="modal" data-target="#ubah_data">
                  <i class="fa fa-check"></i>
                </button>
                @include('tindaklanjutdesa.form_tindak_lanjut')
              @endif
              <a href="{{ route('tindaklanjutbansosdesa.index')  }}" class="pull-right btn btn-primary btn-md">
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
    #mapdesa { height: 350px; }
</style>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $penyaluran->kecamatan->lat }}, {{ $penyaluran->kecamatan->long }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $penyaluran->kecamatan->lat }}, {{ $penyaluran->kecamatan->long }}]).addTo(map)
        .bindPopup('{!! $penyaluran->map_popup_content !!}');
</script>
<script>
  var map = L.map('mapdesa').setView([{{ $penyaluran->desa->lat }}, {{ $penyaluran->desa->long }}], {{ config('leaflet.detail_zoom_level') }});

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([{{ $penyaluran->desa->lat }}, {{ $penyaluran->desa->long }}]).addTo(map)
      .bindPopup('{!! $penyaluran->map_popup_konten !!}');
</script>
@endpush