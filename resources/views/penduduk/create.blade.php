@extends('template.main')
@section('title', 'Tambah Data Penduduk')

@section('content')
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ url('penduduk.create') }}">
      <em class="fa fa-user"></em>
    </a></li>
    <li class="active">Penduduk</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Penduduk</h1>
  </div>
</div><!--/.row-->
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        Tambah Data Penduduk
        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
      <div class="panel-body">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('penduduk.store') }}" accept-charset="UTF-8">
              {{ csrf_field() }}
              <div class="card-body">
                  <div class="form-group">
                      <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                      <input id="jenis_kelamin" type="text" class="form-control{{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required>
                      {!! $errors->first('jenis_kelamin', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                  </div>
                  <div class="form-group">
                      <label for="alamat" class="control-label">Alamat</label>
                      <textarea id="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" rows="4">{{ old('alamat') }}</textarea>
                      {!! $errors->first('alamat', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="latitude" class="control-label">Latitude</label>
                              <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" required>
                              {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="longitude" class="control-label">Longitude</label>
                              <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" required>
                              {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer">
                  <input type="submit" value="Tambah" class="btn btn-info btn-fill pull-left">
                  <a href="{{ route('penduduk.index') }}" class="btn btn-primary btn-fill pull-right">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        Lokasi Kamu
        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
      <div class="panel-body">
        <div id="show_maps"  style="width:100%;height:100%;"></div>
      </div>
    </div>
  </div>
</div><!--/.row-->
@endsection