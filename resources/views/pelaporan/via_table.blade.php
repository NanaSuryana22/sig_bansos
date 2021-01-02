<div class="row">
  <div class="col-md-12">
    <section id="no-more-tables">
      <a href="{{ route('pelaporan.create') }}" class="btn btn-sm btn-info btn-jarak">Buat Laporan / Pengaduan</a>
      <hr />
      <table class="table table-bordered table-striped table-condensed cf">
        <thead class="cf">
          <tr>
            <th>Nomor</th>
            <th>Judul Laporan</th>
            <th>Nama Pembuat</th>
            <th>Kecamatan</th>
            <th>Desa</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pelaporan as $no => $b)
            <tr>
              <td data-title="Nomor">{{ ++$no + ($pelaporan->currentPage()-1) * $pelaporan->perPage() }}</td>
              <td data-title="Judul Laporan">{{ ucfirst($b->judul_laporan) }}</td>
              <td data-title="Nama Pembuat">{{ ucfirst($b->user->name) }}</td>
              <td data-title="Kecamatan">{{ ucfirst($b->kecamatan->nama) }}</td>
              <td data-title="Desa">{{ ucfirst($b->desa->nama_desa) }}</td>
              @if($b->status_kecamatan == NULL && $b->status_kemensos == NULL)
                <td data-title="Status Laporan">{{ ucfirst($b->status_desa) }}</td>
              @elseif ($b->status_kecamatan != NULL && $b->status_kemensos == NULL)
                <td data-title="Status Laporan">{{ ucfirst($b->status_kecamatan) }}</td>
              @elseif ($b->status_kecamatan != NULL && $b->status_kemensos != NULL)
                <td data-title="Status Laporan">{{ ucfirst($b->status_kemensos) }}</td>
              @endif
              <td class="numeric" data-title="Aksi">
                <form action="{{ route('pelaporan.destroy', $b->id) }}" method="post">
                   <a class="btn btn-primary btn-xs"
                    href="{{ route('pelaporan.show',$b->id) }}" title="Lihat Detail">
                    <i class="fa fa-eye"></i>
                  </a>
                  @if ($b->status_desa == 'Dalam Proses Verifikasi')
                    <a class="btn btn-primary btn-xs"
                      href="{{ route('pelaporan.edit',$b->id) }}" title="Ubah Data">
                      <i class="fa fa-pencil"></i>
                    </a>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-xs" type="submit"
                      onclick="return confirm('Yakin ingin menghapus Laporan Ini ?')">
                      <i class="fa fa-trash" title="Hapus Data"></i>
                    </button>
                  @endif
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="jarak-paginate">{!! $pelaporan->links() !!}</div>
    </section>
  </div>
</div>