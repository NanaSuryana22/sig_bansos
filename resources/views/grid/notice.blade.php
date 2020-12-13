@if(Session::has('error'))
  <div class="alert alert-danger alert-dismissable jarak-pemberitahuan">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Pemberitahuan!</strong>
    <br />
    {{ Session::get('error') }}.
  </div>
@endif
@if(Session::has('notice'))
  <div class="alert alert-success alert-dismissable jarak-pemberitahuan">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Pemberitahuan!</strong>
    <br />
    {{ Session::get('notice') }}.
  </div>
@endif