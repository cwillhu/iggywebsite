$.get("/scripts/get_status.php", function(data) {
  console.log( data );
  $("#gr_status").html(data);
});



