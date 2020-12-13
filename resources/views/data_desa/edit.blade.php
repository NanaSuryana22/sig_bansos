@extends('grid.master')
@section('title', 'Form Desa')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Desa</h3>
    <div class="row mt">
      <div class="col-md-7">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('data_desa.update', $desa->id) }}"
            method="post">
            {{csrf_field()}} {{method_field('PUT')}}
            <div class="form-group">
              <label class="col-sm-12" for="user_id">Pilih User</label>
              <div class="col-sm-12">
                <select id="user_id" name="user_id"  class="select_to form-control @error('user_id') is-invalid @enderror" value="{{ $desa->user_id }}">
                  @foreach($users as $u)
                    <option value="{{ $u->id}}">{{ $u->name }} ({{ $u->email }})</option>
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
              <label class="col-sm-12" for="kecamatan_id">Pilih Kecamatan</label>
              <div class="col-sm-12">
                <select id="kecamatan_id" name="kecamatan_id"  class="select_to form-control @error('kecamatan_id') is-invalid @enderror" value="{{ $desa->kecamatan_id }}">
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
              <label class="col-sm-12" for="nama_desa">Nama Desa</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('nama_desa') is-invalid @enderror" name="nama_desa" id="nama_desa" value="{{ $desa->nama_desa }}">
                @if($errors->has('nama_desa'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('nama_desa') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="alamat">Alamat Kantor Desa</label>
              <div class="col-sm-12">
                <textarea class="form-textarea form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{ $desa->alamat }}</textarea>
                @if($errors->has('alamat'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('alamat') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="longitude">Longitude</label>
              <div class="col-sm-12">
                <input id="longitude" type="text" class="form-control @error('long') is-invalid @enderror" name="long" value="{{ $desa->long }}" required>
                @if($errors->has('long'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('long') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="latitude">Latitude</label>
              <div class="col-sm-12">
                <input id="latitude" type="text" class="form-control @error('lat') is-invalid @enderror" name="lat" value="{{ $desa->lat }}" required>
                @if($errors->has('lat'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('lat') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="deskripsi">Deskripsi</label>
              <div class="col-sm-12">
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{ $desa->deskripsi }}</textarea>
                @if($errors->has('deskripsi'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('deskripsi') }}</strong>
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
          <h4 class="mb"><i class="fa fa-angle-right"></i>Tentukan Lokasi Desa</h4>
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
    var mapCenter = [{{ $desa->lat }}, {{ $desa->long }}];
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