<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <!--logo start-->
  <a href="#" class="logo"><b>DSIG<span>UPBSDM</span></b></a>
  <!--logo end-->
  <div class="top-menu">
    <ul class="nav pull-right top-menu">
      <li>
        <a href="{{ route('logout') }}" , class="logout" , onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" title="Keluar Aplikasi ?">
          Keluar
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </a>
      </li>
    </ul>
  </div>
</header>