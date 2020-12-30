@extends('grid.master')
@section('title', 'Data Pengguna')
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
          <a href="{{ route('pengguna.create') }}" class="btn btn-sm btn-info btn-jarak">Tambah Pengguna Baru</a>
          <hr />
          <h4><i class="fa fa-angle-right"></i> Tabel Data Pengguna</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>Nama Pengguna</th>
                  <th>Email</th>
                  <th>Hak Akses</th>
                  <th>Tanggal Bergabung</th>
                  <th class="numeric">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $no => $b)
                @foreach($b->roles as $role)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($users->currentPage()-1) * $users->perPage() }}</td>
                    <td data-title="Nama Pengguna">{{ $b->name }}</td>
                    <td data-title="E-Mail">{{ $b->email }}</td>
                    <td data-title="Hak Akses">{{ucfirst(trans("$role->name"))}}</td>
                    <td data-title="Tanggal Bergabung">{{ Carbon\Carbon::parse($b->created_at)->format('d-m-Y') }}</td>
                    <td class="numeric" data-title="Aksi">
                      <form action="{{ route('pengguna.destroy', $b->id) }}" method="post">
                        <a class="btn btn-primary btn-xs"
                          href="{{ route('pengguna.edit',$b->id) }}" title="Ubah Data">
                          <i class="fa fa-pencil"></i>
                        </a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-xs" type="submit"
                          onclick="return confirm('Yakin ingin menghapus Data Pengguna Ini ?')">
                          <i class="fa fa-trash" title="Hapus Data"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                @endforeach
              </tbody>
            </table>
            <div class="jarak-paginate">{!! $users->links() !!}</div>
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