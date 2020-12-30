@extends('grid.master')
@section('title', 'Form Jenis Bantuan')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Jenis Bantuan</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Inputan Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('bantuan.store') }}" enctype="multipart/form-data"
            method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="col-sm-12" for="nama_bantuan">Nama Bantuan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('nama_bantuan') is-invalid @enderror" name="nama_bantuan" id="nama_bantuan">
                @if($errors->has('nama_bantuan'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('nama_bantuan') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="image">Upload Gambar Untuk Bantuan Ini</label>
              <div class="col-sm-12">
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ old('image') }}">
                @if($errors->has('image'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('image') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="quota">Quota</label>
              <div class="col-sm-12">
                <input type="number" class="form-control @error('quota') is-invalid @enderror" name="quota" id="quota">
                @if($errors->has('quota'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('quota') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="bantuan_berupa">Bantuan Berupa</label>
              <div class="col-sm-12">
                <select class="form-control @error('bantuan_berupa') is-invalid @enderror" name="bantuan_berupa" id="bantuan_berupa" value="{{ old('bantuan_berupa', request('bantuan_berupa')) }}">
                  <option value=""></option>
                  <option value="Tunai">Tunai</option>
                  <option value="Non Tunai">Non Tunai</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                @if($errors->has('bantuan_berupa'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('bantuan_berupa') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="tanggal_dikeluarkan">Rencana Tanggal Penyaluran</label>
              <div class="col-sm-12">
                <input type="date" class="form-control @error('tanggal_dikeluarkan') is-invalid @enderror" name="tanggal_dikeluarkan" id="tanggal_dikeluarkan">
                @if($errors->has('tanggal_dikeluarkan'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('tanggal_dikeluarkan') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="status">Status</label>
              <div class="col-sm-12">
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" value="{{ old('status', request('status')) }}">
                  <option value=""></option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
                @if($errors->has('status'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('status') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-sm btn-primary btn-jarak pull-left">Simpan</button>
                <button type="reset" class="btn btn-sm btn-danger btn-jarak right">Bersihkan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </section>
  <!-- /wrapper -->
</section>
@endsection