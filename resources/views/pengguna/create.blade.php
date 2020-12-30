@extends('grid.master')
@section('title', 'Form Pengguna')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Pengguna</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Ubah Data Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('pengguna.store') }}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label class="col-sm-12" for="name">Nama Pengguna</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autocomplete="nope" required oninvalid="this.setCustomValidity('Harap isi Nama Pengguna')" oninput="setCustomValidity('')">
                @if($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="role_name">Hak Akses</label>
              <div class="col-sm-12">
              <select class="form-control @error('role_name') is-invalid @enderror" name="role_name" id="role_name" value="{{ old('role_name') }}" required>
                <option value="">-- Pilih Hak Akses --</option>
                @foreach($role as $role)
                  <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
              </select>
              @if($errors->has('role_name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('role_name') }}</strong>
                </span>
              @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="email">E-Mail</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" autocomplete="off" required>
                @if($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="password">Password</label>
              <div class="col-sm-12">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required
                                autocomplete="off" value="{{ old('password') }}">
                @if($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="password_confirmation">Konfirmasi Password</label>
              <div class="col-sm-12">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" required
                                autocomplete="off" value="{{ old('password_confirmation') }}">
                @if($errors->has('password_confirmation'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('password_confirmation') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-sm btn-primary btn-jarak pull-left">Simpan</button>
                <button type="reset" class="btn btn-sm btn-warning btn-jarak pull-left">Bersihkan</button>
                <a class="btn btn-sm btn-danger pull-right" href="{{ route('pengguna.index') }}">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </section>
  <!-- /wrapper -->
</section>
@endsection