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
          <form class="form-horizontal style-form" action="{{ route('pengguna.update', $user->id) }}" method="post">
            {{csrf_field()}} {{method_field('PUT')}}
            <div class="form-group">
              <label class="col-sm-12" for="name">Nama Pengguna</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{!! $user->name !!}">
                @if($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="role_id">Hak Akses</label>
              <div class="col-sm-12">
              <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id" value="{!! $user->roles[0]->id !!}">
                <option value="{{ $user->roles[0]->id }}"> --Pilih Hak Akses-- </option>
                @foreach($role as $role)
                  <option value="{{$role->id}}">{{ $role->name }}</option>
                @endforeach
              </select>
              @if($errors->has('role_id'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('role_id') }}</strong>
                </span>
              @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="email">E-Mail</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{!! $user->email !!}">
                @if($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-sm btn-primary btn-jarak pull-left">Ubah Data</button>
                <a class="btn btn-sm btn-danger btn-jarak right" href="{{ route('pengguna.index') }}">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </section>
  <!-- /wrapper -->
</section>
@endsection