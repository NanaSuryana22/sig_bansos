@extends('grid.master')
@section('title', 'Form Ubah Data Penerima BanSos')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Ubah Data Penerima BanSos</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Inputan Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('penduduk.update', $penduduk->id) }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}} {{method_field('PUT')}}
            <div class="form-group">
              <label class="col-sm-12" for="penyaluran_id">ID Penyaluran</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('penyaluran_id') is-invalid @enderror" name="penyaluran_id" id="penyaluran_id" value="{!! $penduduk->penyaluran_id !!}" disabled>
                @if($errors->has('penyaluran_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('penyaluran_id') }}</strong>
                  </span>
                @endif
              </div>
              <input type="hidden" name="penyaluran_id" id="penyaluran_id" value="{{ $penduduk->penyaluran_id }}">
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="nik">Nomor Induk KTP</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{!! $penduduk->nik !!}">
                @if($errors->has('nik'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('nik') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="nama">Nama Lengkap</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{!! $penduduk->nama !!}">
                @if($errors->has('nama'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('nama') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="jenis_kelamin">Jenis Kelamin</label>
              <div class="col-sm-12">
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                  <option value="{{ $penduduk->jenis_kelamin }}"></option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                @if($errors->has('jenis_kelamin'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('jenis_kelamin') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="tempat_lahir">Tempat, Tanggal Lahir</label>
              <div class="col-sm-6">
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir">
                @if($errors->has('tempat_lahir'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('tempat_lahir') }}</strong>
                  </span>
                @endif
              </div>
              <div class="col-sm-6">
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir">
                @if($errors->has('tanggal_lahir'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('tanggal_lahir') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="alamat">Alamat</label>
              <div class="col-sm-12">
               <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ $penduduk->alamat }}</textarea>
                @if($errors->has('alamat'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('alamat') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="agama">Agama</label>
              <div class="col-sm-12">
                <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                  <option value="{{ $penduduk->agama }}"></option>
                  <option value="Islam">Islam</option>
                  <option value="Protestan">Protestan</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Tidak Diketahui">Tidak Diketahui</option>
                </select>
                @if($errors->has('agama'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('agama') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="status_pernikahan">Status Pernikahan</label>
              <div class="col-sm-12">
                <select class="form-control @error('status_pernikahan') is-invalid @enderror" name="status_pernikahan" id="status_pernikahan">
                  <option value="{{ $penduduk->status_pernikahan }}"></option>
                  <option value="Belum Menikah">Belum Menikah</option>
                  <option value="Menikah">Menikah</option>
                  <option value="Duda">Duda</option>
                  <option value="Janda">Janda</option>
                  <option value="Tidak Diketahui">Tidak Diketahui</option>
                </select>
                @if($errors->has('status_pernikahan'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('status_pernikahan') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="pekerjaan">Pekerjaan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" value="{!! $penduduk->pekerjaan !!}">
                @if($errors->has('pekerjaan'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('pekerjaan') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-sm btn-primary btn-jarak pull-left">Ubah Data</button>
                <a class="btn btn-sm btn-danger btn-jarak right" href="{{ route('penduduk.show', $penduduk->penyaluran_id) }}">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </section>
  <!-- /wrapper -->
</section>
@endsection