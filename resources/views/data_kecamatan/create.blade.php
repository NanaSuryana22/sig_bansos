@extends('grid.master')
@section('title', 'Form Kecamatan')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Kecamatan</h3>
    <div class="row mt">
      <div class="col-md-7">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('data_kecamatan.store') }}"
            method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="user_id">Pilih User</label>
              <div class="col-sm-10">
                <select id="user_id" name="user_id" class="select_to form-control @error('user_id') is-invalid @enderror">
                  @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                  @endforeach
                </select>
                @if($errors->has('user_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('user_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="nama">Nama Kecamatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama">
                @if($errors->has('nama'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('nama') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="longitude">Longitude</label>
              <div class="col-sm-10">
                <input id="longitude" type="text" class="form-control @error('long') is-invalid @enderror" name="long" value="{{ old('long', request('long')) }}" required>
                @if($errors->has('long'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('long') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="latitude">Latitude</label>
              <div class="col-sm-10">
                <input id="latitude" type="text" class="form-control @error('lat') is-invalid @enderror" name="lat" value="{{ old('lat', request('lat')) }}" required>
                @if($errors->has('lat'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('lat') }}</strong>
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
          <h4 class="mb"><i class="fa fa-angle-right"></i>Tentukan Lokasi Kecamatan</h4>
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