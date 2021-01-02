@extends('grid.master')
@section('title', 'Pelaporan Masyarakat')
@section('content')
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="panel-heading">
          <ul class="nav nav-tabs nav-justified">
            <li class="active">
              <a data-toggle="tab" href="#via-maps">Pelaporan Via Maps</a>
            </li>
            <li>
              <a data-toggle="tab" href="#via-table" class="contact-map">Pelaporan Via Tabel</a>
            </li>
          </ul>
        </div>
        <!-- /panel-heading -->
        <div class="panel-body">
          <div class="tab-content">
            <div id="via-maps" class="tab-pane active">
              @include('laporan_tingkat_kecamatan.via_maps')
            </div>
            <!-- /tab-pane -->
            <div id="via-table" class="tab-pane">
              @include('laporan_tingkat_kecamatan.via_table')
            </div>
            <!-- /tab-pane -->
          </div>
          <!-- /tab-content -->
        </div>
        <!-- /panel-body -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /container -->
  </section>
  <!-- /wrapper -->
</section>
@endsection