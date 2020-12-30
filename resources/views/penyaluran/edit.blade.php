@extends('grid.master')
@section('title', 'Form Penyaluran')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Penyaluran</h3>
    <div class="row mt">
      <div class="col-md-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('penyaluran.update', $penyaluran->id) }}"
            method="post">
            {{csrf_field()}} {{method_field('PUT')}}
            <div class="form-group">
              <label class="col-sm-12" for="bantuan_id">Pilih Jenis Bantuan Yang Akan Disalurkan</label>
              <div class="col-sm-12">
                <select id="bantuan_id" name="bantuan_id"  class="select_to form-control @error('bantuan_id') is-invalid @enderror" value="{{ $penyaluran->bantuan_id }}">
                  <option value="{{ $penyaluran->bantuan_id }}">-- Pilih Bantuan --</option>
                  @foreach($bantuan as $b)
                    <option value="{{ $b->id}}">{{ $b->nama_bantuan }}</option>
                  @endforeach
                </select>
                @if($errors->has('bantuan_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('bantuan_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="kecamatan_id">Pilih Kecamatan</label>
              <div class="col-sm-12">
                <select id="kecamatan_id" name="kecamatan_id"  class="select_to form-control @error('kecamatan_id') is-invalid @enderror" value="{{ $penyaluran->kecamatan_id }}">
                  <option value="{{ $penyaluran->kecamatan_id }}">-- Pilih Kecamatan --</option>
                  @foreach($kecamatan as $k)
                    <option value="{{ $k->id}}">{{ $k->nama }}</option>
                  @endforeach
                </select>
                @if($errors->has('kecamatan_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('kecamatan_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="desa_id">Pilih Desa</label>
              <div class="col-sm-12">
                <select id="desa_id" name="desa_id"  class="select_to form-control @error('desa_id') is-invalid @enderror" value="{{ $penyaluran->desa_id }}">
                  <option value="{{ $penyaluran->desa_id }}">-- Pilih Desa --</option>
                  @foreach($desa as $d)
                    <option value="{{ $d->id}}">{{ $d->nama_desa }}</option>
                  @endforeach
                </select>
                @if($errors->has('desa_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('desa_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="quota">Jumlah Bantuan Yang Akan Disalurkan</label>
              <div class="col-sm-12">
                <input type="number" class="form-control @error('quota') is-invalid @enderror" name="quota" id="quota" value="{{ $penyaluran->quota }}">
                @if($errors->has('quota'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('quota') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="quota_bantuan">Jumlah Bantuan Yang Tersedia</label>
              <div class="col-sm-12">
                <input type="text" class="form-control @error('quota_bantuan') is-invalid @enderror" name="quota_bantuan" id="quota_bantuan" disabled>
                @if($errors->has('quota_bantuan'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('quota_bantuan') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="keterangan_kemensos">Berikan Keterangan</label>
              <div class="col-sm-12">
                <textarea class="form-textarea form-control @error('keterangan_kemensos') is-invalid @enderror" name="keterangan_kemensos" id="keterangan_kemensos">{{ $penyaluran->keterangan_kemensos }}</textarea>
                @if($errors->has('keterangan_kemensos'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('keterangan_kemensos') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-sm btn-primary btn-jarak pull-left">Ubah Data</button>
                <a href="{{ route('penyaluran.index') }}" class="btn btn-sm btn-danger btn-jarak right">Kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
  </section>
  <!-- /wrapper -->
</section>
@endsection

@push('scripts')
<script src="{{ url('js/penyaluran.js') }}" type="text/javascript">
@endpush