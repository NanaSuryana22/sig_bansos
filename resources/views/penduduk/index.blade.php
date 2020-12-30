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
          <hr />
          <h4><i class="fa fa-angle-right"></i> Data Warga Penerima Bantuan Sosial</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>ID Penyaluran</th>
                  <th>Nama Bantuan</th>
                  <th>Nama Kecamatan</th>
                  <th>Nama Desa</th>
                  <th>Total Penerimaan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($penyaluran as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($penyaluran->currentPage()-1) * $penyaluran->perPage() }}</td>
                    <td data-title="ID Penyaluran">{{ $b->id }}</td>
                    <td data-title="Nama Bantuan">{{ ucfirst($b->bantuan->nama_bantuan) }}</td>
                    <td data-title="Nama Kecamatan">{{ ucfirst($b->kecamatan->nama) }}</td>
                    <td data-title="Nama Desa">{{ ucfirst($b->desa->nama_desa) }}</td>
                    <td data-title="Total Penerimaan">{{ ucfirst($b->quota) }}</td>
                    <td class="numeric" data-title="Aksi">
                      <a class="btn btn-primary btn-xs"
                        href="{{ route('penduduk.show',$b->id) }}" title="Lihat Detail">
                      <i class="fa fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="jarak-paginate">{!! $penyaluran->links() !!}</div>
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
