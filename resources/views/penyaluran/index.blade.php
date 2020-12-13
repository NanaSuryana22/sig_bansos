@extends('grid.master')
@section('title', 'Data Penyaluran Bantuan')
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
          <a href="{{ route('penyaluran.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Penyaluran Bantuan Baru</a>
          <hr />
          <h4><i class="fa fa-angle-right"></i>Data Penyaluran Bantuan Sosial</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>Nama Bantuan</th>
                  <th>Penyaluran Kecamatan</th>
                  <th>Desa</th>
                  <th>Quota</th>
                  <th>Status Penyaluran</th>
                  <th>Keterangan</th>
                  <th class="numeric">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($penyaluran as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($penyaluran->currentPage()-1) * $penyaluran->perPage() }}</td>
                    <td data-title="Nama Bantuan">{{ $b->bantuan->nama_bantuan  }}</td>
                    <td data-title="Nama Kecamatan">{{ $b->kecamatans->nama  }}</td>
                    <td data-title="Nama Desa">{{ $b->desas->nama_desa  }}</td>
                    <td class="numeric" data-title="Quota">{{ $b->quota }}</td>
                    <td class="numeric" data-title="Status Penyaluran">{{ $b->status_tracking_kecamatan }}</td>
                    <td class="numeric" data-title="Keterangan">{{ $b->keterangan_kemensos }}</td>
                    <td class="numeric" data-title="Aksi">
                      <form action="{{ route('penyaluran.destroy', $b->id) }}" method="post">
                        <a class="btn btn-primary btn-xs"
                          href="{{ route('penyaluran.show',$b->id) }}" title="Lihat Detail">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-xs"
                          href="{{ route('penyaluran.edit',$b->id) }}" title="Ubah Data">
                          <i class="fa fa-pencil"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-xs" type="submit"
                          onclick="return confirm('Yakin ingin menghapus Data Penyaluran Ini ?')">
                          <i class="fa fa-trash" title="Hapus Data"></i>
                        </button>
                      </form>
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