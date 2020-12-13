@extends('grid.master')
@section('title', 'Form Penyaluran')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Penyaluran</h3>
    <div class="row mt">
      <div class="col-md-7">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('penyaluran.store') }}"
            method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="col-sm-12" for="bantuan_id">Pilih Jenis Bantuan Yang Akan Disalurkan</label>
              <div class="col-sm-12">
                <select id="bantuan_id" name="bantuan_id"  class="select_to form-control @error('bantuan_id') is-invalid @enderror">
                  @foreach($bantuan as $b)
                    <option value="{{ $b->id}}">{{ $b->nama_bantuan }}</option>
                  @endforeach
                </select>
                @if($errors->has('bantuan_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('bantuan_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="kecamatan_id">Pilih Kecamatan</label>
              <div class="col-sm-12">
                <select id="kecamatan_id" name="kecamatan_id"  class="select_to form-control @error('kecamatan_id') is-invalid @enderror">
                  @foreach($kecamatan as $k)
                    <option value="{{ $k->id}}">{{ $k->nama }}</option>
                  @endforeach
                </select>
                @if($errors->has('kecamatan_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('kecamatan_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="desa_id">Pilih Desa</label>
              <div class="col-sm-12">
                <select id="desa_id" name="desa_id"  class="select_to form-control @error('desa_id') is-invalid @enderror">
                  @foreach($desa as $d)
                    <option value="{{ $d->id}}">{{ $d->nama_desa }}</option>
                  @endforeach
                </select>
                @if($errors->has('desa_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('desa_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="quota">Jumlah Bantuan Yang Akan Disalurkan</label>
              <div class="col-sm-12">
                <input type="number" class="form-control @error('quota') is-invalid @enderror" name="quota" id="quota">
                @if($errors->has('quota'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('quota') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="keterangan_kemensos">Berikan Keterangan</label>
              <div class="col-sm-12">
                <textarea class="form-textarea form-control @error('keterangan_kemensos') is-invalid @enderror" name="keterangan_kemensos" id="keterangan_kemensos"></textarea>
                @if($errors->has('keterangan_kemensos'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('keterangan_kemensos') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-sm btn-primary btn-jarak pull-left">Simpan</button>
                <button type="reset" class="btn btn-sm btn-danger btn-jarak right">Bersihkan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Berikut Merupakan Tracking Penyaluran Bantuan</h4>
          <section class="panel">
            <div class="panel-body">
              <div id="mapid"></div>
            </div>
          </section>
        </div>
      </div>
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

@push('scripts')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>
@endpush