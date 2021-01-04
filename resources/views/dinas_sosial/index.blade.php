@extends('grid.master')
@section('title', 'Beranda')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      @include('dinas_sosial.information_app')
    </div>
    <div class="row mt">
      <div class="col-md-6">
        <div class="content-panel">
          <div class="panel-body">
            {!! $penyaluran->render() !!}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="content-panel">
          <div class="panel-body">
            {!! $pelaporan->render() !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
@endsection

@section('styles')
{!! Charts::assets() !!}
@endsection

