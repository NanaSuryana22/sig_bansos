@extends('grid.master')
@section('title', 'Form Laporan Pengaduan')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Form Pembuatan Laporan</h3>
    <div class="row mt">
      <div class="col-md-5">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Tentukan Lokasi Kejadian</h4>
          <section class="panel">
            <div class="panel-body">
              <div id="mapid"></div>
            </div>
          </section>
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('pelaporan.store') }}" enctype="multipart/form-data"
            method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="col-sm-12" for="judul_laporan">Judul Laporan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('judul_laporan') is-invalid @enderror" name="judul_laporan" id="judul_laporan">
                @if($errors->has('judul_laporan'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('judul_laporan') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="kecamatan_id">Pilih Kecamatan</label>
              <div class="col-sm-12">
                <select id="kecamatan_id" name="kecamatan_id" class="select_to form-control @error('kecamatan_id') is-invalid @enderror">
                  <option value="0">-- Pilih Kecamatan --</option>
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
                  <option value="0">-- Pilih Desa --</option>
                </select>
                @if($errors->has('desa_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('desa_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="alamat">Alamat / Patokan Lokasi</label>
              <div class="col-sm-12">
                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                @if($errors->has('alamat'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('alamat') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="image_1">Upload Gambar 1</label>
              <div class="col-sm-12">
                <input type="file" class="form-control @error('image_1') is-invalid @enderror" name="image_1" id="image_1" value="{{ old('image_1') }}">
                @if($errors->has('image_1'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('image_1') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="image_2">Upload Gambar 2</label>
              <div class="col-sm-12">
                <input type="file" class="form-control @error('image_2') is-invalid @enderror" name="image_2" id="image_2" value="{{ old('image_2') }}">
                @if($errors->has('image_2'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('image_2') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="image_3">Upload Gambar 3</label>
              <div class="col-sm-12">
                <input type="file" class="form-control @error('image_3') is-invalid @enderror" name="image_3" id="image_3" value="{{ old('image_3') }}">
                @if($errors->has('image_3'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('image_3') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="longitude">Longitude</label>
              <div class="col-sm-12">
                <input id="longitude" type="text" class="form-control @error('long') is-invalid @enderror" name="long" value="{{ old('long', request('long')) }}" required>
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
                <input id="latitude" type="text" class="form-control @error('lat') is-invalid @enderror" name="lat" value="{{ old('lat', request('lat')) }}" required>
                @if($errors->has('lat'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('lat') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="desciption">Isi / Uraian Laporan</label>
              <div class="col-sm-12">
                <textarea class="form-textarea form-control @error('desciption') is-invalid @enderror" name="desciption" id="desciption"></textarea>
                @if($errors->has('desciption'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('desciption') }}</strong>
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
    </div>
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
<script src="{{ url('js/get_desa.js') }}" type="text/javascript">
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
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