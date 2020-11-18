window.setTimeout(function() //menampilkan alert box setelah 2s
{
  $(".alert").fadeTo(500, 0).slideUp(500, function() //waktu lamanya box fade menghilang dan form slide up
  {
    $(this).remove(); 
  });
}, 2000);