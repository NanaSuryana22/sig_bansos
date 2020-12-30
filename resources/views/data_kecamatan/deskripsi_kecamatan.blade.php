<div class="row">
  <div class="col-md-6 detailed">
    <div id="mapid"></div>
  </div>
  <!-- /col-md-6 -->
  <div class="col-md-6 detailed">
    <br />
    <table border="0" class="table-condensed cf">
      <tr>
        <td>Nama Kecamatan</td>
        <td>:</td>
        <td>{{ $kecamatan->nama }}</td>
      </tr>
      <tr>
        <td>Nama Petugas Kecamatan</td>
        <td>:</td>
        <td>{{ $kecamatan->user->name }}</td>
      </tr>
      <tr>
        <td>Titik Koordinat Longitude</td>
        <td>:</td>
        <td>{{ $kecamatan->long }}</td>
      </tr>
      <tr>
        <td>Titik Koordinat Latitude</td>
        <td>:</td>
        <td>{{ $kecamatan->lat }}</td>
      </tr>
    </table>
  </div>
  <!-- /col-md-6 -->
</div>
<br />
<form action="{{ route('data_kecamatan.destroy', $kecamatan->id) }}" method="post">
  <a href="{{ route('data_kecamatan.edit',$kecamatan->id) }}" class="pull-left btn btn-warning btn-md">
    <i class="fa fa-pencil" title="Ubah Data"></i>
  </a>
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <button type="submit" class="pull-left btn btn-danger btn-md btn-bantuan"
    onclick="return confirm('Yakin ingin menghapus Kecamatan Ini ?')">
    <i class="fa fa-trash" title="Hapus Data"></i>
  </button>
  <a href="{{ route('data_kecamatan.index') }}" class="pull-right btn btn-primary btn-md">
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
    var map = L.map('mapid').setView([{{ $kecamatan->lat }}, {{ $kecamatan->long }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $kecamatan->lat }}, {{ $kecamatan->long }}]).addTo(map)
        .bindPopup('{!! $kecamatan->map_popup_content !!}');
</script>
@endpush