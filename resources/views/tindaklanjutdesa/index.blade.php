@extends('grid.master')
@section('title', 'Tindak Lanjut Penyaluran')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- /row -->
    <div class="row mt">
      <div class="col-lg-12">
        @include('grid.notice')
      </div>
      <div class="col-lg-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Data Penyaluran</h4>
          <section id="no-more-tables">
            <table class="table table-bordered table-striped table-condensed cf">
              <thead class="cf">
                <tr>
                  <th>Nomor</th>
                  <th>ID Penyaluran</th>
                  <th>Nama Bantuan</th>
                  <th class="numeric">Jumlah Penyaluran</th>
                  <th class="numeric">Bantuan Berupa</th>
                  <th>Status Penyaluran Kecamatan</th>
                  <th>Status Penyaluran Desa</th>
                  <th class="numeric">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($penyaluran as $no => $b)
                  <tr>
                    <td data-title="Nomor">{{ ++$no + ($penyaluran->currentPage()-1) * $penyaluran->perPage() }}</td>
                    <td data-title="ID Penyaluran">{{ $b->id }}</td>
                    <td data-title="Nama Bantuan">{{ $b->bantuan->nama_bantuan }}</td>
                    <td class="numeric" data-title="Quota">{{ number_format($b->quota) }} Keluarga</td>
                    <td class="numeric" data-title="Bantuan Berupa">{{ ucfirst($b->bantuan->bantuan_berupa) }}</td>
                    <td data-title="Status Di Kecamatan">{{ ucfirst($b->status_tracking_kecamatan) }}</td>
                    <td data-title="Status Di Desa">{{ ucfirst($b->status_tracking_desa) }}</td>
                    <td class="numeric" data-title="Aksi">
                      <a class="btn btn-primary btn-xs" href="{{ route('tindaklanjutbansosdesa.show',$b->id) }}" title="Lihat Detail">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if($b->status_tracking_desa == 'Dalam Proses' && $b->status_tracking_kecamatan == 'Diterima')
                        <button class="btn btn-primary btn-xs" title="Ubah Data" data-toggle="modal" data-target="#ubah_data">
                          <i class="fa fa-check"></i>
                        </button>
                        @include('tindaklanjutdesa.form')
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="jarak-paginate">{!! $penyaluran->links() !!}</div>
          </section>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-12 -->
    </div>
    <!-- /row -->
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
@endsection