<div class="row">
  <div class="col-md-12">
    <br />
    <section id="no-more-tables">
      <table class="table table-bordered table-striped table-condensed cf">
        <thead class="cf">
          <tr>
            <th>Nama Desa</th>
            <th>Alamat</th>
            <th class="numeric">Langitude</th>
            <th class="numeric">Longitude</th>
            <th class="numeric">Deskripsi</th>
            <th class="numeric">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($desa as $no => $b)
            <tr>
              <td data-title="Nama Desa">{{ $b->nama_desa }}</td>
              <td data-title="Alamat">{{ $b->alamat }}</td>
              <td class="numeric" data-title="Longitude">{{ $b->long }}</td>
              <td class="numeric" data-title="Langitude">{{ $b->lat }}</td>
              <td class="numeric" data-title="Deskripsi">{{ $b->deskripsi }}</td>
              <td class="numeric" data-title="Aksi">
                <form action="{{ route('data_desa.destroy', $b->id) }}" method="post">
                  <a class="btn btn-primary btn-xs" href="{{ route('data_desa.show',$b->id) }}"
                    title="Lihat Detail">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a class="btn btn-primary btn-xs" href="{{ route('data_desa.edit',$b->id) }}"
                    title="Ubah Data">
                    <i class="fa fa-pencil"></i>
                  </a>
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-danger btn-xs" type="submit"
                    onclick="return confirm('Yakin ingin menghapus Desa Ini ?')">
                    <i class="fa fa-trash" title="Hapus Data"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>
  </div>
</div>

<br />
<a href="{{ route('data_kecamatan.index') }}" class="pull-right btn btn-primary btn-md">
  <i class="fa fa-mail-reply" title="Kembali"></i>
</a>