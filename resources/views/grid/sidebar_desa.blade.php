<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="profile.html"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg/1200px-Logo_of_the_Ministry_of_Social_Affairs_of_the_Republic_of_Indonesia.svg.png" class="img-circle" width="80"></a></p>
      <h5 class="centered"><?= Auth::user()->name; ?></h5>
      <li class="mt">
        <a href="{{ route('desa') }}">
          <i class="fa fa-home"></i>
          <span>Halaman Utama</span>
        </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-clock-o"></i>
          <span>Tindak Lanjut</span>
        </a>
        <ul class="sub">
          <li><a href="{{ route('tindaklanjutbansosdesa.index') }}">Penerimaan Bantuan Sosial</a></li>
          <li><a href="{{ route('penduduk.index') }}">Data Penerima BanSos</a></li>
          <li><a href="{{ route('list_pelaporan_desa') }}">Pelaporan Masyarakat</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-map-marker"></i>
          <span>Peta Sebaran BanSos</span>
        </a>
        <ul class="sub">
          <li><a href="{{ route('sebaran_bansos_kecamatan') }}">Tingkat Kecamatan</a></li>
          <li><a href="{{ route('sebaran_bansos_desa') }}">Tingkat Desa</a></li>
        </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>