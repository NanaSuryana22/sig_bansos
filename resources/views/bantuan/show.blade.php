@extends('grid.master')
@section('title', 'Detail Jenis Bantuan')
@section('content')
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="panel-heading">
          <ul class="nav nav-tabs nav-justified">
            <li class="active">
              <a data-toggle="tab" href="#bantuan">Deskripsi Bantuan</a>
            </li>
          </ul>
        </div>
        <!-- /panel-heading -->
        <div class="panel-body">
          <div class="tab-content">
            <!-- /tab-pane -->
            <div id="bantuan">
              <div class="row">
                <div class="col-md-6 detailed">
                  <img src="{{ url($bantuan->image) }}" alt="..." class="img-thumbnail">
                </div>
                <!-- /col-md-6 -->
                <div class="col-md-6 detailed">
                  <br />
                  <table border="0" class="table-condensed cf">
                  <tr>
                    <td>Nama Bantuan</td><td>:</td>
                    <td>{{ $bantuan->nama_bantuan }}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Bantuan</td><td>:</td>
                    <td>Untuk {{ number_format($bantuan->quota) }} Keluarga</td>
                  </tr>
                  <tr>
                    <td>Bantuan Berupa</td><td>:</td>
                    <td>{{ ucfirst($bantuan->bantuan_berupa) }}</td>
                  </tr>
                  <tr>
                    <td>Rencana Tanggal Penyaluran</td><td>:</td>
                    <td>{{ Carbon\Carbon::parse($bantuan->tanggal_dikeluarkan)->format('d M Y') }}</td>
                  </tr>
                  <tr>
                    <td>Status</td><td>:</td>
                    <td>{{ ucfirst($bantuan->status) }}</td>
                  </tr>
                  </table>
                </div>
                <!-- /col-md-6 -->
              </div>
              <br />
              <form action="{{ route('bantuan.destroy', $bantuan->id) }}" method="post">
                <a href="{{ route('bantuan.edit',$bantuan->id) }}" class="pull-left btn btn-warning btn-md">
                  <i class="fa fa-pencil" title="Ubah Data"></i>
                </a>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="pull-left btn btn-danger btn-md btn-bantuan" onclick="return confirm('Yakin ingin menghapus Jenis Bantuan Ini ?')">
                  <i class="fa fa-trash" title="Hapus Data"></i>
                </button>
                <a href="{{ route('bantuan.index')  }}" class="pull-right btn btn-primary btn-md">
                <i class="fa fa-mail-reply" title="Kembali"></i>
                </a>
              </form>
              <!-- /row -->
            </div>
            <!-- /tab-pane -->
          </div>
          <!-- /tab-content -->
        </div>
        <!-- /panel-body -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /container -->
  </section>
  <!-- /wrapper -->
</section>
@endsection