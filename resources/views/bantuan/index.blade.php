@extends('grid.master')
@section('title', 'Jenis Bantuan')
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
          <a href="{{ route('bantuan.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Jenis
            Bantuan</a>
          <hr />
          <h4><i class="fa fa-angle-right"></i> Tabel Jenis Bantuan</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>Nama Bantuan</th>
                  <th class="numeric">Qouta</th>
                  <th class="numeric">Bantuan Berupa</th>
                  <th class="numeric">Rencana Tanggal Penyaluran</th>
                  <th class="numeric">Status</th>
                  <th class="numeric">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bantuan as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($bantuan->currentPage()-1) * $bantuan->perPage() }}</td>
                    <td data-title="Nama Bantuan">{{ $b->nama_bantuan }}</td>
                    <td class="numeric" data-title="Quota">{{ number_format($b->quota) }} Keluarga</td>
                    <td class="numeric" data-title="Bantuan Berupa">{{ ucfirst($b->bantuan_berupa) }}</td>
                    <td class="numeric" data-title="Tanggal Dikeluarkan">
                      {{ Carbon\Carbon::parse($b->tanggal_dikeluarkan)->format('d-m-Y') }}
                    </td>
                    <td class="numeric" data-title="Status">{{ ucfirst($b->status) }}</td>
                    <td class="numeric" data-title="Aksi">
                      <form action="{{ route('bantuan.destroy', $b->id) }}" method="post">
                        {{--  <a class="btn btn-primary btn-xs"
                          href="{{ route('bantuan.show',$b->id) }}" title="Lihat Detail">
                          <i class="fa fa-eye"></i>
                        </a>  --}}
                        <a class="btn btn-primary btn-xs"
                          href="{{ route('bantuan.edit',$b->id) }}" title="Ubah Data">
                          <i class="fa fa-pencil"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-xs" type="submit"
                          onclick="return confirm('Yakin ingin menghapus Jenis Bantuan Ini ?')">
                          <i class="fa fa-trash" title="Hapus Data"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="jarak-paginate">{!! $bantuan->links() !!}</div>
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