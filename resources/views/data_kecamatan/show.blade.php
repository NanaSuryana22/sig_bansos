@extends('grid.master')
@section('title', 'Detail Kecamatan')
@section('content')
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="panel-heading">
          <ul class="nav nav-tabs nav-justified">
            <li class="active">
              <a data-toggle="tab" href="#overview">Deskripsi Kecamatan</a>
            </li>
            <li>
              <a data-toggle="tab" href="#contact" class="contact-map">Log Bantuan</a>
            </li>
            <li>
              <a data-toggle="tab" href="#edit">Daftar Desa</a>
            </li>
          </ul>
        </div>
        <!-- /panel-heading -->
        <div class="panel-body">
          <div class="tab-content">
            <div id="overview" class="tab-pane active">
              @include('data_kecamatan.deskripsi_kecamatan')
            </div>
            <!-- /tab-pane -->
            <div id="contact" class="tab-pane">
              @if(isset($penyaluran))
                @include('data_kecamatan.log_bantuan')
              @endif
            </div>
            <!-- /tab-pane -->
            <div id="edit" class="tab-pane">
              @include('data_kecamatan.daftar_desa')
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