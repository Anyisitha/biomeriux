document.addEventListener("DOMContentLoaded", function() {
  //console.log('estoy corriendo');
  jQuery('.single-edr_lesson button.edr-button').on( "click", function() {
    $.ajax({
      url : intentos_vars.ajaxurl,
      type: 'get',
      dataType: "json",
      data: {
        action : 'enviarIntentos',
      },
      complete: function(){
        console.log('En proceso');
      },
      success: function(resultado){
        console.log(resultado);
      },
      error:
        function(m){
          console.log( ":(" );
        }
    });
  });

});
