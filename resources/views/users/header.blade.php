<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Tabel Pengguna</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('user') }}">Pengguna</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
    @if (Session::has('error'))
      <div class="session-flash alert-danger">
        {{Session::get('error')}}
      </div>
    @endif
    @if (Session::has('notice'))
      <div class="session-flash alert-info">
        {{Session::get('notice')}}
      </div>
    @endif
  </div><!-- /.container-fluid -->
</div>