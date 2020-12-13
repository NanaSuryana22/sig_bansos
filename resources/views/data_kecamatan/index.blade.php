@extends('grid.master')
@section('title', 'Data Kecamatan')
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
          <a href="{{ route('data_kecamatan.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Kecamatan Baru</a>
          <hr />
          <h4><i class="fa fa-angle-right"></i> Tabel Data Kecamatan</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>Nama Kecamatan</th>
                  <th class="numeric">Langitude</th>
                  <th class="numeric">Longitude</th>
                  <th class="numeric">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kecamatan as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($kecamatan->currentPage()-1) * $kecamatan->perPage() }}</td>
                    <td data-title="Nama Kecamatan">{{ $b->nama }}</td>
                    <td class="numeric" data-title="Longitude">{{ $b->long }}</td>
                    <td class="numeric" data-title="Langitude">{{ $b->lat }}</td>
                    <td class="numeric" data-title="Aksi">
                      <form action="{{ route('data_kecamatan.destroy', $b->id) }}" method="post">
                        <a class="btn btn-primary btn-xs"
                          href="{{ route('data_kecamatan.show',$b->id) }}" title="Lihat Detail">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-xs"
                          href="{{ route('data_kecamatan.edit',$b->id) }}" title="Ubah Data">
                          <i class="fa fa-pencil"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-xs" type="submit"
                          onclick="return confirm('Yakin ingin menghapus Data Kecamatan Ini ?')">
                          <i class="fa fa-trash" title="Hapus Data"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="jarak-paginate">{!! $kecamatan->links() !!}</div>
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