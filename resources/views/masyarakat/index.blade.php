@extends('grid.master')
@section('title', 'Beranda')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <div class="row mt">
      @include('dinas_sosial.information_app')
    </div>
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <div class="panel-body">
            {!! $chart_pelaporan->render() !!}
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
@endsection

@section('styles')
{!! Charts::assets() !!}
@endsection