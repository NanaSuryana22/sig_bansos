$(document).ready(function () {
  //ajax select desa untuk penyaluran
  $('select[name="kecamatan_id"]').on('change', function () {
    let kecamatan_id = $(this).val();
    if (kecamatan_id) {
      jQuery.ajax({
        url: '/desa/' + kecamatan_id,
        type: "GET",
        dataType: "json",
        success: function (response) {
          $('select[name="desa_id"]').empty();
          $('select[name="desa_id"]').append('<option value="">-- Pilih Desa --</option>');
          $.each(response, function (key, value) {
            $('select[name="desa_id"]').append('<option value="' + key + '">' + value + '</option>');
          });
        },
      });
    } else {
      $('select[name="desa_id"]').append('<option value="">-- Pilih Desa --</option>');
    }
  });
});