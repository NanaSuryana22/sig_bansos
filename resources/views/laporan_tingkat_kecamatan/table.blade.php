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
                  <th>Nomor Handphone</th>
                  <th>Alamat</th>
                  <th>Status Laporan</th>
                  <th class="numeric">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pelaporan as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($pelaporan->currentPage()-1) * $pelaporan->perPage() }}</td>
                    <td data-title="Judul Laporan">{{ ucfirst($b->judul_laporan) }}</td>
                    <td data-title="Nama Pembuat">{{ ucfirst($b->user->name) }}</td>
                    <td data-title="Nomor Handphone"><a href="tel:{{ $b->phone_number }}">{{ $b->phone_number }}</a></td>
                    <td data-title="Alamat">{{ ucfirst($b->alamat) }}</td>
                    @if($b->status_kecamatan == NULL && $b->status_kemensos == NULL)
                      <td data-title="Status Laporan">{{ ucfirst($b->status_desa) }}</td>
                    @elseif ($b->status_kecamatan != NULL && $b->status_kemensos == NULL)
                      <td data-title="Status Laporan">{{ ucfirst($b->status_kecamatan) }}</td>
                    @elseif ($b->status_kecamatan != NULL && $b->status_kemensos != NULL)
                      <td data-title="Status Laporan">{{ ucfirst($b->status_kemensos) }}</td>
                    @endif
                    <td class="numeric" data-title="Aksi">
                      <a class="btn btn-primary btn-xs" href="{{ route('laporan_tingkat_kecamatan.show',$b->id) }}" title="Lihat Detail">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if ($b->status_desa == 'Diteruskan Ke Tingkat Kecamatan' && $b->status_kecamatan == NULL)
                        <button class="btn btn-primary btn-xs" title="Tindak Lanjut Laporan Ini ?" data-toggle="modal" data-target="#approval_kecamatan">
                          <i class="fa fa-check"></i>
                        </button>
                        @include('laporan_tingkat_kecamatan.approval_kec')
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