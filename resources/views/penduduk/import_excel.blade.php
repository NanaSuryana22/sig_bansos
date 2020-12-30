<div class="modal fade" id="import_excel_penduduk" tabindex="-1" role="dialog" aria-labelledby="import_excel_penduduk" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Import Excel Penduduk</h4>
      </div>
      <form class="form-horizontal style-form" action="/penduduk/import_excel" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-12" for="file">Pilih File Excel</label>
            <div class="col-sm-12">
              <input type="file" name="file" required="required">
              <br />
              <a href="{{ url('file_penduduk/ExampleDataPenduduk.xlsx') }}" target="_blank">Download Template Excel</a>
              @if($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('file') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-grup">
            <h5> * Catatan :
              <br />
              <br />
              <b>Isi ID Penyaluran dengan nilai : {{ $penyaluran->id }}</b>
            </h5>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary pull-right">Import</button>
         </div>
      </form>
    </div>
  </div>
</div>