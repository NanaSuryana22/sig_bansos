<div class="modal fade" id="approval_kecamatan" tabindex="-1" role="dialog" aria-labelledby="approval_kecamatan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tindak Lanjut Laporan Masyarakat</h4>
      </div>
      <form class="form-horizontal style-form" action="{{ route('laporan_tingkat_kecamatan.update', $pelaporan->id) }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-12" for="status_kecamatan">Pilih Status Tindak Lanjut</label>
            <div class="col-sm-12">
              <select id="status_kecamatan" name="status_kecamatan" class="form-control @error('status_kecamatan') is-invalid @enderror" required oninvalid="this.setCustomValidity('Pilih Status Tindak Lanjut')" oninput="setCustomValidity('')">
                <option value=""> --Pilih Status-- </option>
                <option value="Ditangani oleh Petugas Kecamatan">Terima</option>
                <option value="Diteruskan Ke Kemensos">Terima Dan Teruskan Ke Kemensos</option>
                <option value="Ditolak">Tolak</option>
              </select>
              @if($errors->has('status_kecamatan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('status_kecamatan') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="keterangan_kecamatan">Keterangan</label>
            <div class="col-sm-12">
              <textarea name="keterangan_kecamatan" id="keterangan_kecamatan" class="form-control @error('keterangan_kecamatan') is-invalid @enderror" required oninvalid="this.setCustomValidity('Harap isi Keterangan')" oninput="setCustomValidity('')"></textarea>
              @if($errors->has('keterangan_kecamatan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('keterangan_kecamatan') }}</strong>
                </span>
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary pull-right">Simpan</button>
         </div>
      </form>
    </div>
  </div>
</div>