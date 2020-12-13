@extends('template.main')
@section('title', 'Penduduk')

@section('content')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('penduduk.index') }}">
      <em class="fa fa-user"></em>
    </a></li>
    <li class="active">Penduduk</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Tabel Penduduk</h1>
  </div>
</div><!--/.row-->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a class="btn btn-outline-info" href={{ route('penduduk.create') }}>Tambah Data Penduduk</a>
        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
      <div class="panel-body">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nomor.</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                ?>
                @foreach ($penduduks as $p)
                <tr>
                  <td><?= $no; ?></td>
                  <td>{{ $p->alamat }}</td>
                  <td>{{ $p->jenis_kelamin }}</td>
                  <td>{{ $p->latitude }}</td>
                  <td>{{ $p->longitude }}</td>
                  <td>{{ $p->keterangan }}</td>
                  <td>
                    <form action="{{ route('penduduk.destroy', $p->id) }}" method="post">
                      <a class="btn btn-primary btn-sm" href="{{ route('penduduk.show',$p->id) }}" title="Lihat Detail">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a class="btn btn-info btn-sm" href="{{ route('penduduk.edit',$p->id) }}" title="Ubah Data">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus Penduduk Ini ?')">
                        <i class="fas fa-trash" title="Hapus Data"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                <?php $no++; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!--/.row-->
@endsection
