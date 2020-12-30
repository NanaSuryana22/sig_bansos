<div class="modal fade" id="ubah_data" tabindex="-1" role="dialog" aria-labelledby="ubah_data" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tindak Lanjut Penyaluran</h4>
      </div>
      <form class="form-horizontal style-form" action="{{ route('tindaklanjutbansoskecamatan.update', $penyaluran->id) }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <h5 class="jarak-keterangan-status">Status Penyaluran : <b>Diterima</b></h5>
          </div>
          <input type="hidden" name="status_tracking_kecamatan" id="status_tracking_kecamatan" value="Diterima">
          <div class="form-group">
            <label class="col-sm-12" for="keterangan_kecamatan">Berikan Ulasan / Keterangan</label>
            <div class="col-sm-12">
              <textarea name="keterangan_kecamatan" id="keterangan_kecamatan" class="form-control @error('keterangan_kecamatan') is-invalid @enderror" required oninvalid="this.setCustomValidity('Harap isi Ulasan / Keterangan')" oninput="setCustomValidity('')"></textarea>
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