$("#btnmdl").click(function(){
  document.getElementById('contenedor').className="cdesactiva";
  document.getElementById('modal').className="mactiva";
});

$("#cerrar").click(function(){
  document.getElementById('modal').className='mdesactiva';
  document.getElementById('contenedor').className='cactiva';
});


$("#enviar").click(function(){

    var confirma = confirm('Â¿Esta seguro que desea enviar los datos?');

    if (confirma) {
        $("#Resultado").empty();
        $("#Resultado").addClass("estiloRecibiendo");
        $("#Resultado").html("<h2 style='margin-left: 20px; margin-top: 5px; color: darkblue;'>Esperando Respuesta ...</h2>");

        $.ajax({
            type:"post",
            url:"./respuesta.php",
            data:
            {
                id: $("#usuario").val(),
                login: $("#login").val(),
                apellido: $("#apellido").val(),
                nombres: $("#nombre").val(),
                fechaNac: $("#edad").val(),
            },
            success: function(respuestaDelServer,estado) {
                $("#Resultado").removeClass("estiloRecibiendo");
                $("#Resultado").html("<h2 style='margin-left: 20px; margin-top: 5px; color: darkblue;'>Resultado de la transformacion a JSON en el servidor: </h2><h4 style='margin-top: 12px; margin-left:10px;'>" + respuestaDelServer + "</h4>");
            }
        });
    }else{
        return false;
    }

});
