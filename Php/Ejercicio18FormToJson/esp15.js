$("#btnmdl").click(function(){
  document.getElementById('contenedor').className="cdesactiva";
  document.getElementById('modal').className="mactiva";
});

$("#cerrar").click(function(){
  document.getElementById('modal').className='mdesactiva';
  document.getElementById('contenedor').className='cactiva';
});


$("#enviar").click(function(){
        $("#Resultado").empty();
        $("#Resultado").addClass("estiloRecibiendo");
        $("#Resultado").html("<h2 style='margin-left: 20px; margin-top: 5px; color: darkblue;'>Esperando Respuesta ...</h2>");

        $.ajax({
            type:"post",
            url:"./respuesta.php",
            data:
            {
                usuario: $("#usuario").val(),
                login: $("#login").val(),
                apellido: $("#apellido").val(),
                nombre: $("#nombre").val(),
                edad: $("#edad").val(),
            },
            success: function(respuestaDelServer,estado) {
                $("#Resultado").removeClass("estiloRecibiendo");
                $("#Resultado").html("<h2>JSON en el servidor: </h2><h4>" + respuestaDelServer + "</h4>");
            }
        });
});
