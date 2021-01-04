<table border="0">
    <tr>
        <td>Nama Bantuan :</td>
        <td>{{ $data_penyaluran->bantuan->nama_bantuan }}</td>
    </tr>
    <tr>
        <td>Jumlah Bantuan :</td>
        <td>{{ $data_penyaluran->quota }} Keluarga</td>
    </tr>
    <tr>
        <td>Nama Kecamatan :</td>
        <td>{{ $data_penyaluran->kecamatan->nama }}</td>
    </tr>
    <tr>
        <td>Nama Desa :</td>
        <td>{{ $data_penyaluran->desa->nama_desa }}</td>
    </tr>
</table>
<br>
<table>
  <thead>
  <tr>
      <th>Nomor</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Tempat, Tanggal Lahir</th>
      <th>Alamat</th>
      <th>Agama</th>
      <th>Status Pernikahan</th>
      <th>Pekerjaan</th>
  </tr>
  </thead>
  <tbody>
    @foreach($results as $no => $b)
      <tr>
          <td>{{ $no+1 }}</td>
          <td>{{ $b->nama }}</td>
          <td>{{ $b->jenis_kelamin }}</td>
          <td>{{ $b->tempat_tanggal_lahir }}</td>
          <td>{{ $b->alamat }}</td>
          <td>{{ $b->agama }}</td>
          <td>{{ $b->status_pernikahan }}</td>
          <td>{{ $b->pekerjaan }}</td>
      </tr>
    @endforeach
  </tbody>