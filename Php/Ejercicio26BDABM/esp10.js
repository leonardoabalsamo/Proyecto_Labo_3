$(document).ready(function() {

    objCodAlta=document.getElementById("#codAlta");
    objApeAlta=document.getElementById("#apeAlta");
    objEdadAlta=document.getElementById("#edadAlta");
    objAltaAlta=document.getElementById("#altaAlta");
    objPuestoAlta=document.getElementById("#puestoAlta");
    objAreaAlta=document.getElementById("#areaAlta");
    objArchivoAlta=document.getElementById("#btnArchivoAlta");


    objCodModi=document.getElementById("#codModi");
    objApeModi=document.getElementById("#apeModi");
    objEdadModi=document.getElementById("#edadModi");
    objAltaModi=document.getElementById("#altaModi");
    objPuestoModi=document.getElementById("#puestoModi");
    objAreaModi=document.getElementById("#areaModi");
    objArchivoModi=document.getElementById("#btnArchivoModi");


    $("#modalAlta").css("visibility","hidden");
    $("#modalModi").css("visibility","hidden");
    $("#modalServer").css("visibility","hidden");

    $("#EnviarAlta").attr("disabled",true);
    $("#EnviarModi").attr("disabled",true);

    $("#orden").val("apellido");
    $("#codigo" ).click(function() {
    $("#orden").val("codigo");
    cargaTabla();
    }); //cierro click()
    $("#apellido" ).click(function() {
    $("#orden").val("apellido");
    cargaTabla();
    });
    $("#edad" ).click(function() {
    $("#orden").val("edad");
    cargaTabla();
    });
    $("#alta" ).click(function() {
    $("#orden").val("alta");
    cargaTabla();
    });
    $("#puesto" ).click(function() {
    $("#orden").val("puesto");
    cargaTabla();
    });
    $("#area" ).click(function() {
    $("#orden").val("area");
    cargaTabla();
    });

    $("#EnviarModi").click(function() {
      funcionModi();});

    $("#EnviarAlta").click(function() {
      funcionAlta();});

    $("#codAlta").keyup(function() {
    todoListoParaAlta();
    });

    $("#codModi").keyup(function() {
    todoListoParaModi();
    });

}); //cierro ready

$("#cargar").click(function(){ cargaTabla(); });

$("#vaciar").click(function(){ $("#bodytabla").empty(); $("#totalRegistros").empty(); });

// Muestro Modal de Altas
$("#btnalta").click(function() {
    $("#contenedor").addClass("cdesactiva");
    $("#tabla").addClass("cdesactiva");
    $("#modalModi").css("visibility","hidden");
    $("#modalAlta").css("visibility","visible");
  });


$("#botoncerrarAlta").click(function(){
    $("#contenedor").addClass("activa");
    $("#modalAlta").css("visibility","hidden");
});

$("#botoncerrarModi").click(function(){
    $("#contenedor").addClass("activa");
    $("#modalModi").css("visibility","hidden");
});


// Falta modal respuesta!!!!!!


function cargaTabla(){
        $("#bodytabla").empty();
        $("#bodytabla").html("<h3>Esperando respuesta..</h3>");
        var objAjax = $.ajax({
              type:"get",
              url:"./basedatos.php",
              data: {
                      orden: $("#orden").val(),
                      inputCodigo: $("#inputCodigo").val(),
                      inputApellido: $("#inputApellido").val(),
                      inputEdad: $("#inputEdad").val(),
                      inputAlta: $("#inputAlta").val(),
                      inputPuesto: $("#inputPuesto").val(),
                      inputArea: $("#inputArea").val(),
                    }, // El cliente pide los datos
              success: function(respuestaDelServer,estado) {
                          $("#bodytabla").empty();
                          objJson=JSON.parse(respuestaDelServer);
                          console.log(objJson);
                          objJson.personas.forEach(function(valor,indice) {
                                      var fila = document.createElement("tr"); // Genero una fila

                                      var codigo = document.createElement("td"); // Genero la celda
                                      codigo.setAttribute("campo-dato", "codigo"); // CSS
                                      codigo.innerHTML = valor.codigo; //
                                      fila.appendChild(codigo);

                                      var apellido = document.createElement("td");
                                      apellido.setAttribute("campo-dato", "apellido");
                                      apellido.innerHTML = valor.apellido;
                                      fila.appendChild(apellido);

                                      var edad = document.createElement("td");
                                      edad.setAttribute("campo-dato", "edad");
                                      edad.innerHTML = valor.edad;
                                      fila.appendChild(edad);

                                      var alta = document.createElement("td");
                                      alta.setAttribute("campo-dato", "alta");
                                      alta.innerHTML = valor.alta;
                                      fila.appendChild(alta);

                                      var puesto = document.createElement("td");
                                      puesto.setAttribute("campo-dato", "puesto");
                                      puesto.innerHTML = valor.puesto;
                                      fila.appendChild(puesto);

                                      var area = document.createElement("td");
                                      area.setAttribute("campo-dato", "area");
                                      area.innerHTML = valor.area;
                                      fila.appendChild(area);

                                      /*********** Creo botones dinamicos *************/

                                      var btnpdf = document.createElement("td");
                                      btnpdf.setAttribute("campo-dato","btnpdf");
                                      btnpdf.innerHTML="<button class='btnBD'>Pdf</button>";
                                      fila.appendChild(btnpdf);


                                      var btnmodi = document.createElement("td");
                                      btnmodi.setAttribute("campo-dato","btnmodi");
                                      btnmodi.innerHTML="<button class='btnBD'>Modificar</button>";
                                      fila.appendChild(btnmodi);

                                      btnmodi.onclick=function() {
                                          $("#contenedor").addClass("cdesactiva");
                                          $("#modalModi").css("visibility","visible");
                                          $("#modalAlta").css("visibility","hidden");
                                          completarModi(valor.codigo);
                                          };

                                      var btnborrar = document.createElement("td");
                                      btnborrar.setAttribute("campo-dato","btnborrar");
                                      btnborrar.innerHTML="<button class='btnBD'>Borrar</button>";
                                      fila.appendChild(btnborrar);

                                      document.getElementById("bodytabla").appendChild(fila);
                        });
                        $("#totalRegistros").html("Nro de registros: " + objJson.cuenta);
                      }
                  });
}


function completarModi(valor){
    var codigoP = valor;
    var objAjax = $.ajax({
        type:"get",
        url:"./completar.php",
        data: {inputCodigo: codigoP},
        success: function(respuestaDelServer,estado) {
              ojbJson = JSON.parse(respuestaDelServer);
                $("#codModi").val(ojbJson.codigo),
                $("#apeModi").val(ojbJson.apellido),
                $("#edadModi").val(ojbJson.edad),
                $("#altaModi").val(ojbJson.alta),
                $("#puestoModi").val(ojbJson.puesto),
                $("#areaModi").val(ojbJson.area)
              }
    });
}



function todoListoParaAlta() {
    if ((objCodAlta.checkValidity() == true)&&(objApeAlta.checkValidity()== true)&&(objEdadAlta.checkValidity()== true)
    &&(objAltaAlta.checkValidity()== true)&&(objPuestoAlta.checkValidity()== true)&&(objAreaAlta.checkValidity()== true)){
      $("#EnviarAlta").attr("disabled",false);
    } else {  $("#EnviarAlta").attr("disabled",true); }
}




function todoListoParaModi() {
    if ((objCodModi.checkValidity() == true)&&(objApeModi.checkValidity()== true)&&(objEdadModi.checkValidity()== true)
    &&(objAltaModi.checkValidity()== true)&&(objPuestoModi.checkValidity()== true)&&(objAreaModi.checkValidity()== true)){
      $("#EnviarModi").attr("disabled",false);
    } else {  $("#EnviarModi").attr("disabled",true); }
}

function funcionAlta(){
  var objAjax = $.ajax({
        type:"get",
        url:"./BDAlta.php",
        data: { // datos que enviamos desde form Alta
                codAlta: $("#codAlta").val(),
                apeAlta: $("#apeAlta").val(),
                edadAlta: $("#edadAlta").val(),
                altaAlta: $("#altaAlta").val(),
                puestoAlta: $("#puestoAlta").val(),
                areaAlta: $("#areaAlta").val(),
              }, // El cliente pide los datos
});  }


function funcionModi(){
  var objAjax = $.ajax({
        type:"get",
        url:"./BDModi.php",
        data: { // datos que enviamos desde form Alta
                codModi: $("#codModi").val(),
                apeModi: $("#apeModi").val(),
                edadModi: $("#edadModi").val(),
                altaModi: $("#altaModi").val(),
                puestoModi: $("#puestoModi").val(),
                areaModi: $("#areaModi").val(),
              }, // El cliente pide los datos
});  }
