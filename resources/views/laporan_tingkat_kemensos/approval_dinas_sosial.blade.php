<div class="modal fade" id="approval_dinas_sosial" tabindex="-1" role="dialog" aria-labelledby="approval_dinas_sosial" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tindak Lanjut Laporan Masyarakat</h4>
      </div>
      <form class="form-horizontal style-form" action="{{ route('laporan_tingkat_kemensos.update', $pelaporan->id) }}" method="post">
        {{csrf_field()}} {{method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-12" for="status_kemensos">Pilih Status Tindak Lanjut</label>
            <div class="col-sm-12">
              <select id="status_kemensos" name="status_kemensos" class="form-control @error('status_kemensos') is-invalid @enderror" required oninvalid="this.setCustomValidity('Pilih Status Tindak Lanjut')" oninput="setCustomValidity('')">
                <option value=""> --Pilih Status-- </option>
                <option value="Ditangani oleh Dinas Sosial">Terima</option>
                <option value="Ditolak">Tolak</option>
              </select>
              @if($errors->has('status_kemensos'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('status_kemensos') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="keterangan_kemensos">Keterangan</label>
            <div class="col-sm-12">
              <textarea name="keterangan_kemensos" id="keterangan_kemensos" class="form-control @error('keterangan_kemensos') is-invalid @enderror" required oninvalid="this.setCustomValidity('Harap isi Keterangan')" oninput="setCustomValidity('')"></textarea>
              @if($errors->has('keterangan_kemensos'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('keterangan_kemensos') }}</strong>
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