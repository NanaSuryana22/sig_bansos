<div class="row">
  <div class="col-md-12">
    <br />
    <section id="no-more-tables">
      <table class="table table-bordered table-striped table-condensed cf">
        <thead class="cf">
          <tr>
            <th>Nomor</th>
            <th>Nama Bantuan</th>
            <th>Jumlah Bantuan</th>
            <th>Penyaluran Ke Desa</th>
            <th>Status Penyaluran Kecamatan</th>
            <th>Status Penyaluran Desa</th>
            <th class="numeric">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($penyaluran as $no => $b)
            <tr>
              <td data-title="Nomor">{{ ++$no + ($penyaluran->currentPage()-1) * $penyaluran->perPage() }}</td>
              <td data-title="Nama Bantuan">{{ $b->bantuan->nama_bantuan  }}</td>
              <td class="numeric" data-title="Quota">{{ $b->quota }}</td>
              <td data-title="Nama Desa">{{ $b->desa->nama_desa  }}</td>
              <td data-title="Status Penyaluran">{{ $b->status_tracking_kecamatan  }}</td>
              <td data-title="Status Penyaluran">{{ $b->status_tracking_desa  }}</td>
              <td class="numeric" data-title="Aksi">
                <a class="btn btn-primary btn-xs" href="{{ route('penyaluran.show',$b->id) }}"
                  title="Lihat Detail">
                  <i class="fa fa-eye"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="jarak-paginate">{!! $penyaluran->links() !!}</div>
    </section>
  </div>
</div>

<br />
<a href="{{ route('data_kecamatan.index') }}" class="pull-right btn btn-primary btn-md">
  <i class="fa fa-mail-reply" title="Kembali"></i>
</a>