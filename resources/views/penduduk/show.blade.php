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
          <div class="btn-import-export-excel">
            @if($penyaluran->desa_id == $desa_id[0])
              <button class="btn btn-primary btn-sm" title="Import Data Penerima Bansos Via Excel" data-toggle="modal"
                data-target="#import_excel_penduduk">
                <i class="fa fa-download"></i> Import Data
              </button>
              @include('penduduk.import_excel')
            @endif
            <a href="{{ url('penduduk/export', $penyaluran->id) }}" class="btn btn-primary btn-sm">
              <i class="fa fa-upload" title="Download Excel"></i> Export Data
            </a>
            <a href="{{ url()->previous() }}" class="pull-right btn btn-primary btn-sm">
              <i class="fa fa-mail-reply" title="Kembali"></i>
            </a>
          </div>
          <hr />
          <h4><i class="fa fa-angle-right"></i> Data Warga Penerima Bantuan Sosial</h4>
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
                  @if($penyaluran->desa_id == $desa_id[0])
                    <th>Aksi</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach($penduduk as $no => $b)
                  <tr>
                    <td data-title="Nomor">
                      {{ ++$no + ($penduduk->currentPage()-1) * $penduduk->perPage() }}</td>
                    <td data-title="NIK">{{ $b->nik }}</td>
                    <td data-title="Nama Lengkap">{{ ucfirst($b->nama) }}</td>
                    <td data-title="Jenis Kelamin">{{ ucfirst($b->jenis_kelamin) }}</td>
                    <td data-title="Tempat, Tgl Lahir">{{ ucfirst($b->tempat_tanggal_lahir) }}</td>
                    <td data-title="Alamat">{{ ucfirst($b->alamat) }}</td>
                    <td data-title="Agama">{{ ucfirst($b->agama) }}</td>
                    <td data-title="Status Pernikahan">{{ ucfirst($b->status_pernikahan) }}</td>
                    <td data-title="Pekerjaan">{{ ucfirst($b->pekerjaan) }}</td>
                    @if($penyaluran->desa_id == $desa_id[0])
                      <td data-title="Aksi">
                        <form action="{{ route('penduduk.destroy', $b->id) }}" method="post">
                          {{--  <a class="btn btn-primary btn-xs"
                          href="{{ route('bantuan.show',$b->id) }}" title="Lihat Detail">
                          <i class="fa fa-eye"></i>
                          </a> --}}
                          <a class="btn btn-primary btn-xs"
                            href="{{ route('penduduk.edit',$b->id) }}" title="Ubah Data">
                            <i class="fa fa-pencil"></i>
                          </a>
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button class="btn btn-danger btn-xs" type="submit"
                            onclick="return confirm('Yakin ingin menghapus Data Penduduk Ini ?')">
                            <i class="fa fa-trash" title="Hapus Data"></i>
                          </button>
                        </form>
                      </td>
                    @endif
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