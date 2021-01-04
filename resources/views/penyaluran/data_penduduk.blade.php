@extends('grid.master')
@section('title', 'Data Warga Penerima BanSos')

@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- /row -->
    <div class="row mt">
      <div class="col-lg-12">
        @include('grid.notice')
      </div>
      <div class="col-lg-12">
        <div class="content-panel">
          <div class="btn-kembali-data-penduduk">
            <a href="{{url('penduduk/export', $penyaluran->id)}}" class="pull-left btn btn-primary btn-sm btn-jarak">
              <i class="fa fa-download" title="Download Excel"></i>
            </a>
            <a href="{{ url()->previous() }}" class="pull-right btn btn-primary btn-sm">
              <i class="fa fa-mail-reply" title="Kembali"></i>
            </a>
          </div>
          <hr />
          <h4><i class="fa fa-table"></i> Data Warga Penerima Bantuan Sosial</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>NIK</th>
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
                @foreach($penduduk as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($penduduk->currentPage()-1) * $penduduk->perPage() }}</td>
                    <td data-title="NIK">{{ $b->nik }}</td>
                    <td data-title="Nama Lengkap">{{ ucfirst($b->nama) }}</td>
                    <td data-title="Jenis Kelamin">{{ ucfirst($b->jenis_kelamin) }}</td>
                    <td data-title="Tempat, Tgl Lahir">{{ ucfirst($b->tempat_tanggal_lahir) }}</td>
                    <td data-title="Alamat">{{ ucfirst($b->alamat) }}</td>
                    <td data-title="Agama">{{ ucfirst($b->agama) }}</td>
                    <td data-title="Status Pernikahan">{{ ucfirst($b->status_pernikahan) }}</td>
                    <td data-title="Pekerjaan">{{ ucfirst($b->pekerjaan) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="jarak-paginate">{!! $penduduk->links() !!}</div>
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
@endsection
