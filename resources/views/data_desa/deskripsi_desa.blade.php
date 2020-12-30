<div class="row">
  <div class="col-md-6 detailed">
    <div id="mapid"></div>
  </div>
  <!-- /col-md-6 -->
  <div class="col-md-6 detailed">
    <br />
    <dl class="row">
      <dt class="col-sm-4">Nama Kecamatan</dt>
      <dd class="col-sm-8">{{ $desa->kecamatan->nama }}</dd>
      <div class="col-md-12">
        <hr />
      </div>
      <dt class="col-sm-4">Nama Desa</dt>
      <dd class="col-sm-8">{{ $desa->nama_desa }}</dd>
      <div class="col-md-12">
        <hr />
      </div>
      <dt class="col-sm-4">Nama Petugas Desa</dt>
      <dd class="col-sm-8">{{ $desa->user->name }}</dd>
      <div class="col-md-12">
        <hr />
      </div>
      <dt class="col-sm-4">Alamat</dt>
      <dd class="col-sm-8">{{ $desa->alamat }}</dd>
      <div class="col-md-12">
        <hr />
      </div>
      <dt class="col-sm-4">Titik Koordinat Longitude</dt>
      <dd class="col-sm-8">{{ $desa->long }}</dd>
      <div class="col-md-12">
        <hr />
      </div>
      <dt class="col-sm-4">Titik Koordinat Latitude</dt>
      <dd class="col-sm-8">{{ $desa->lat }}</dd>
      <div class="col-md-12">
        <hr />
      </div>
      <dt class="col-sm-4">Deskripsi</dt>
      <dd class="col-sm-8">{{ $desa->deskripsi }}</dd>
      <div class="col-md-12">
        <hr />
      </div>
    </dl>
  </div>
  <!-- /col-md-6 -->
</div>
<br />
<form action="{{ route('data_desa.destroy', $desa->id) }}" method="post">
  <a href="{{ route('data_desa.edit',$desa->id) }}" class="pull-left btn btn-warning btn-md">
    <i class="fa fa-pencil" title="Ubah Data"></i>
  </a>
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <button type="submit" class="pull-left btn btn-danger btn-md btn-bantuan"
    onclick="return confirm('Yakin ingin menghapus Desa Ini ?')">
    <i class="fa fa-trash" title="Hapus Data"></i>
  </button>
  <a href="{{ route('data_desa.index') }}" class="pull-right btn btn-primary btn-md">
    <i class="fa fa-mail-reply" title="Kembali"></i>
  </a>
</form>

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 400px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $desa->lat }}, {{ $desa->long }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $desa->lat }}, {{ $desa->long }}]).addTo(map)
        .bindPopup('{!! $desa->map_popup_content !!}');
</script>
@endpush