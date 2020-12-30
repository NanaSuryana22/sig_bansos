var mapCenter = [{
  {
    request('latitude', config('leaflet.map_center_latitude'))
  }
}, {
  {
    request('longitude', config('leaflet.map_center_longitude'))
  }
}];
var map = L.map('mapid').setView(mapCenter, {
  {
    config('leaflet.zoom_level')
  }
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker = L.marker(mapCenter).addTo(map);

function updateMarker(lat, lng) {
  marker
    .setLatLng([lat, lng])
    .bindPopup("Your location :  " + marker.getLatLng().toString())
    .openPopup();
  return false;
};

map.on('click', function (e) {
  let latitude = e.latlng.lat.toString().substring(0, 15);
  let longitude = e.latlng.lng.toString().substring(0, 15);
  $('#latitude').val(latitude);
  $('#longitude').val(longitude);
  updateMarker(latitude, longitude);
});

var updateMarkerByInputs = function () {
  return updateMarker($('#latitude').val(), $('#longitude').val());
}
$('#latitude').on('input', updateMarkerByInputs);
$('#longitude').on('input', updateMarkerByInputs);