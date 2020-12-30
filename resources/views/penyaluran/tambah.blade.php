@extends('grid.master')
@section('title', 'Form Penyaluran')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Form Penyaluran</h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <h4 class="mb"><i class="fa fa-angle-right"></i>Silahkan Isi Form Inputan Berikut</h4>
          <form class="form-horizontal style-form" action="{{ route('penyaluran.store') }}"
            method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="col-sm-12" for="bantuan_id">Pilih Jenis Bantuan Yang Akan Disalurkan</label>
              <div class="col-sm-12">
                <select id="bantuan_id" name="bantuan_id"  class="select_to form-control @error('bantuan_id') is-invalid @enderror">
                  <option value=""> --Pilih Jenis Bantuan-- </option>
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
              <label class="col-sm-12" for="quota">Quota Yg Disalurkan</label>
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
              <label class="col-sm-12" for="quota_bantuan">Quota Yg Tersedia</label>
              <div class="col-sm-12">
                <input type="number" class="form-control @error('quota_bantuan') is-invalid @enderror" name="quota_bantuan" id="quota_bantuan" disabled>
                @if($errors->has('quota_bantuan'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('quota_bantuan') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="kecamatan_id">Pilih Kecamatan</label>
              <div class="col-sm-12">
                <select id="kecamatan_id" name="kecamatan_id" class="select_to form-control @error('kecamatan_id') is-invalid @enderror">
                  <option value="0">-- Pilih Kecamatan --</option>
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
                <select id="desa_id" name="desa_id" class="select_to form-control @error('desa_id') is-invalid @enderror">
                  <option value="0">-- Pilih Desa --</option>
                </select>
                @if($errors->has('desa_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('desa_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12" for="keterangan_kemensos">Berikan Keterangan</label>
              <div class="col-sm-12">
                <textarea class="form-textarea form-control @error('keterangan_kemensos') is-invalid @enderror" name="keterangan_kemensos" id="keterangan_kemensos"></textarea>
                @if($errors->has('keterangan_kemensos'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('keterangan_kemensos') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <input type="hidden" name="status_tracking_kecamatan" id="status_tracking_kecamatan" value="Dalam Proses">
            <input type="hidden" name="status_tracking_desa" id="status_tracking_desa" value="Dalam Proses">
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

@push('scripts')
<script src="{{ url('js/penyaluran.js') }}" type="text/javascript">
@endpush