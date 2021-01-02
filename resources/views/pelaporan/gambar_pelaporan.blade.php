<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Gambar Laporan</h4>
    </div>
    <div class="modal-body">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="{{ url($pelaporan->image_1) }}" class="d-block w-100" alt="...">
          </div>
          @isset($pelaporan->image_2)
            <div class="item">
              <img src="{{ url($pelaporan->image_2) }}" class="d-block w-100" alt="...">
            </div>
          @endisset
          @isset($pelaporan->image_3)
            <div class="item">
              <img src="{{ url($pelaporan->image_3) }}" class="d-block w-100" alt="...">
            </div>
          @endisset
        </div>
        <!-- membuat panah next dan previous -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>