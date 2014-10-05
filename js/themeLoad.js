$.post( "test.php", { type: "theme", time: "2pm" })
  .done(function( data ) {
    alert( "Data Loaded: " + data );
  });