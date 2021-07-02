$(document).ready(function() {
  Sesion();
}



function Sesion(){
var objAjax = $.ajax({
      type:"get",
      url:"./login.php",
      data: {
              usuario: $("#usuario").val(),
              clave: $("#clave").val(),            
            }, // El cliente pide los datos
      success: function(respuestaDelServer,estado) {
                  $("#bodytabla").empty();
                  objJson=JSON.parse(respuestaDelServer);
                  console.log(objJson);

                }


                )};

}
