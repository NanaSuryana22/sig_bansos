@extends('grid.master')
@section('title', 'Data Pelaporan')
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
          <a href="{{ route('pelaporan.create') }}" class="btn btn-sm btn-info btn-jarak">Buat Laporan / Pengaduan</a>
          <hr />
          <h4><i class="fa fa-angle-right"></i>Tabel Pelaporan</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>Judul Laporan</th>
                  <th>Nama Pembuat</th>
                  <th>Nama Kecamatan</th>
                  <th>Nama Desa</th>
                  <th>Status</th>
                  <th class="numeric">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pelaporan as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($pelaporan->currentPage()-1) * $pelaporan->perPage() }}</td>
                    <td data-title="Judul Laporan">{{ ucfirst($b->judul_laporan) }}</td>
                    <td data-title="Nama Pembuat">{{ ucfirst($b->user->name) }}</td>
                    <td data-title="Nama Kecamatan">{{ ucfirst($b->kecamatan->nama) }}</td>
                    <td data-title="Nama Desa">{{ ucfirst($b->desa->nama_desa) }}</td>
                    <td class="numeric" data-title="Status">{{ ucfirst($b->status) }}</td>
                    <td class="numeric" data-title="Aksi">
                      <a class="btn btn-primary btn-xs" href="{{ route('pelaporan.show',$b->id) }}" title="Lihat Detail">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if($b->status == 'Dalam Proses Verifikasi')
                        <button class="btn btn-primary btn-xs" title="Tindak Lanjut Laporan Ini ?" data-toggle="modal" data-target="#approval_desa">
                          <i class="fa fa-check"></i>
                        </button>
                        @include('pelaporan.approval_desa')
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="jarak-paginate">{!! $pelaporan->links() !!}</div>
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