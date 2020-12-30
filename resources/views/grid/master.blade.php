<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>DSIGUPBSDM - @yield('title')</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ url('dashio/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <link href="{{ url('css/custom.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <!--external css-->
  <link href="{{ url('dashio/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ url('dashio/css/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ url('dashio/lib/gritter/css/jquery.gritter.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ url('dashio/css/style.css') }}" rel="stylesheet">
  <link href="{{ url('dashio/css/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ url('dashio/lib/chart-master/Chart.js') }} "></script>
  <link href="{{ url('dashio/css/table-responsive.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
  <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
  <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('styles')
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    @include('grid.header')
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    @if(Auth::user()->roles[0]->name == 'dinas_sosial')
      @include('grid.sidebar_dinas_sosial')
    @elseif(Auth::user()->roles[0]->name == 'kecamatan')
      @include('grid.sidebar_kecamatan')
    @elseif(Auth::user()->roles[0]->name == 'desa')
      @include('grid.sidebar_desa')
    @elseif(Auth::user()->roles[0]->name == 'masyarakat')
      @include('grid.sidebar_masyarakat')
    @endif
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    @yield('content')
    <!--main content end-->
    <!--footer start-->
    @include('grid.footer')
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('js/apps.js') }}"></script>
  @stack('scripts')
  <!-- Bootstrap JS 3.3.7 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{Config::get('app.url')}}/node_modules/select2/dist/js/select2.min.js"></script>
  <script src="{{ url('dashio/lib/jquery/jquery.min.js') }}"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  <script src="{{ url('dashio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript"
    src="{{ url('dashio/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ url('dashio/lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ url('dashio/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ url('dashio/lib/jquery.sparkline.') }}js"></script>
  <!--common script for all pages-->
  <script src="{{ url('dashio/lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ url('dashio/lib/gritter/js/jquery.gritter.js') }}">
  </script>
  <script type="text/javascript" src="{{ url('dashio/lib/gritter-conf.js') }}"></script>
  <!--script for this page-->
  <script src="{{ url('dashio/lib/sparkline-chart.js') }}"></script>
  <script src="{{ url('dashio/lib/zabuto_calendar.js') }}"></script>
  <!--script for this page-->
  <script type="text/javascript" src="{{ url('dashio/lib/jquery-ui-1.9.2.custom.min.js') }}">
  </script>
  <script type="text/javascript"
    src="{{ url('dashio/lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
  <script type="text/javascript"
    src="{{ url('dashio/lib/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript"
    src="{{ url('dashio/lib/bootstrap-daterangepicker/date.js') }}"></script>
  <script type="text/javascript"
    src="{{ url('dashio/lib/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script type="text/javascript"
    src="{{ url('dashio/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}">
  </script>
  <script type="text/javascript"
    src="{{ url('dashio/lib/bootstrap-daterangepicker/moment.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.select_to').select2();
    });
  </script>
  <script src="{{ url('dashio/lib/fancybox/jquery.fancybox.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ url('dashio/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
  <script src="{{ url('js/locateControl.js') }}"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyAzWV0p7BB_KGyp-xPzV-WL7wJefjV9KQY&sensor=false&libraries=geometry&v=3.7"></script>
  <script src="{{ url('dashio/lib/google-maps/maplace.js') }}"></script>
  <script src="{{ url('dashio/lib/google-maps/data/points.js') }}"></script>
  <script>
    //ul list example
    new Maplace({
      locations: LocsB,
      map_div: '#gmap-list',
      controls_type: 'list',
      controls_title: 'Choose a location:'
    }).Load();

    new Maplace({
      locations: LocsB,
      map_div: '#gmap-tabs',
      controls_div: '#controls-tabs',
      controls_type: 'list',
      controls_on_map: false,
      show_infowindow: false,
      start: 1,
      afterShow: function(index, location, marker) {
        $('#info').html(location.html);
      }
    }).Load();
  </script>
  <script type="text/javascript">
    $(function() {
      //    fancybox
      jQuery(".fancybox").fancybox();
    });
  </script>
</body>

</html>