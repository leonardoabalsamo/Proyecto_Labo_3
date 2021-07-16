

$(document).ready(function() {

    $("#btCierraSesion").click(function() {
    location.href='../destruirsesion.php';
    });

    objCodAlta=document.getElementById("#codAlta");
    objApeAlta=document.getElementById("#apeAlta");
    objEdadAlta=document.getElementById("#edadAlta");
    objAltaAlta=document.getElementById("#altaAlta");
    objPuestoAlta=document.getElementById("#puestoAlta");
    objAreaAlta=document.getElementById("#areaAlta");

    objCodModi=document.getElementById("#codModi");
    objApeModi=document.getElementById("#apeModi");
    objEdadModi=document.getElementById("#edadModi");
    objAltaModi=document.getElementById("#altaModi");
    objPuestoModi=document.getElementById("#puestoModi");
    objAreaModi=document.getElementById("#areaModi");

    $("#orden").val("apellido");

    $("#modalAlta").css("visibility","hidden");
    $("#modalModi").css("visibility","hidden");
    $("#modalServer").css("visibility","hidden");


    cargaTabla();

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

    //$("#EnviarAlta").attr("disabled",true);
    //$("#EnviarModi").attr("disabled",true);


    $("#EnviarModi").click(function() {
      funcionModi();
      cargaTabla();});

    $("#EnviarAlta").click(function() {
      funcionAlta();
      cargaTabla();});

}); //cierro ready


$("#codAlta").keyup(function() {
todoListoParaAlta();
});

$("#codModi").keyup(function() {
todoListoParaModi();
});


$("#cargar").click(function(){ cargaTabla(); });

$("#vaciar").click(function(){ $("#bodytabla").empty(); $("#totalRegistros").empty(); });

// Muestro Modal de Altas
$("#btnalta").click(function() {
    $("#contenedorModal").addClass("cdesactiva");
    $("#modalModi").css("visibility","hidden");
    $("#modalAlta").css("visibility","visible");
    if ($("areaAlta").empty()){
      completaAreaAlta();
    }
  });


$("#botoncerrarAlta").click(function(){
    $("#contenedorModal").addClass("activa");
    $("#modalAlta").css("visibility","hidden");
});

$("#botoncerrarModi").click(function(){
    $("#contenedorModal").addClass("activa");
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
                                      btnpdf.onclick=function() {
                                          cargarPdf(valor.codigo);
                                          };
                                      fila.appendChild(btnpdf);


                                      var btnmodi = document.createElement("td");
                                      btnmodi.setAttribute("campo-dato","btnmodi");
                                      btnmodi.innerHTML="<button class='btnBD'>Modificar</button>";
                                      btnmodi.onclick=function() {
                                          $("#contenedorModal").addClass("cdesactiva");
                                          $("#modalAlta").css("visibility","hidden");
                                          $("#modalModi").css("visibility","visible");
                                          completarModi(valor.codigo);
                                          completaAreaModi();
                                          };
                                      fila.appendChild(btnmodi);

                                      var btnborrar = document.createElement("td");
                                      btnborrar.setAttribute("campo-dato","btnborrar");
                                      btnborrar.innerHTML="<button class='btnBD'>Borrar</button>";
                                      btnborrar.onclick=function() {
                                          funcionBorrar(valor.codigo);
                                          }
                                      fila.appendChild(btnborrar);

                                      document.getElementById("bodytabla").appendChild(fila);
                        });
                        $("#totalRegistros").html("Nro de registros: " + objJson.cuenta);
                      }
                  });
}

function completarModi(valor){
    var objAjax = $.ajax({
        type:"get",
        url:"./completar.php",
        data: {codigo: valor},
        success: function(respuestaDelServer,estado) {
              console.log(respuestaDelServer);
              ojbJson = JSON.parse(respuestaDelServer);
              ojbJson.personas.forEach(function(valor,indice){
                  $("#codModi").val(valor.codigo);
                  $("#apeModi").val(valor.apellido);
                  $("#edadModi").val(valor.edad);
                  $("#altaModi").val(valor.alta);
                  $("#puestoModi").val(valor.puesto);
                  completaArea();
              })
              }
    });
}

function completaAreaModi(){
    var objEquipos = $.ajax({
        type:"get",
        url:"./listaAreas.php",
        data: {},
        success: function(respuestaDelServer,estado) {
            console.log(respuestaDelServer);
            ojbJsonAreas = JSON.parse(respuestaDelServer);
            ojbJsonAreas.areas.forEach(function(valor,indice){
                var objetoOpcion = document.createElement("option");
                objetoOpcion.setAttribute("className", valor.area);
                objetoOpcion.setAttribute("name", valor.area);
                objetoOpcion.innerHTML = valor.area;
                document.getElementById("areaModi").appendChild(objetoOpcion);
            })
        }
    });
}

function completaAreaAlta(){
    var objEquipos = $.ajax({
        type:"get",
        url:"./listaAreas.php",
        data: {},
        success: function(respuestaDelServer,estado) {
            console.log(respuestaDelServer);
            ojbJsonAreas = JSON.parse(respuestaDelServer);
            ojbJsonAreas.areas.forEach(function(valor,indice){
                var objetoOpcion = document.createElement("option");
                objetoOpcion.setAttribute("className", valor.area);
                objetoOpcion.setAttribute("name", valor.area);
                objetoOpcion.innerHTML = valor.area;
                document.getElementById("areaAlta").appendChild(objetoOpcion);
            })
        }
    });
}

function funcionBorrar(valor){
    var objAjax = $.ajax({
        type:"post",
        url:"./BDBaja.php",
        data:
        { codigo: valor } });
    cargaTabla();
}


function cargarPdf(codigo){
    var objAjax = $.ajax({
        type:"get",
        url:"./pdf.php",
        data:
        {
            codigo: codigo
        },
        success: function(respuestaDelServer){
            console.log(respuestaDelServer);
            objPdf = JSON.parse(respuestaDelServer);
            console.log(respuestaDelServer);
            $("#contenedorModal").addClass("cdesactiva");
            $("#modalAlta").css("visibility","hidden");
            $("#modalModi").css("visibility","hidden");
            $("#modalServer").css("visibility","visible");
            $("#contServer").empty();
            $("#contServer").html("<iframe width='100%' height='300px' src='data:application/pdf;base64,"+objPdf.pdf+"'></iframe>");
        }
    });
}

function todoListoParaAlta() {
    if (objCodAlta.checkValidity() == true){
      $("#EnviarAlta").attr("disabled",false);
    } else {  $("#EnviarAlta").attr("disabled",true); }
}

function todoListoParaModi() {
    if (objCodModi.checkValidity() == true){
      $("#EnviarModi").attr("disabled",false);
    } else {  $("#EnviarModi").attr("disabled",true); }
}


function funcionAlta(){
  var datos = new FormData($('#formalta')[0]);
  var objAjax = $.ajax({
        type:"post",
        method:"post",
        enctype:'multipart/form-data',
        url:"./BDAlta.php",
        processData:false,
        contentType:false,
        cache:false,
        data: datos,

}); cargaTabla(); }



function funcionModi(){
  var datos = new FormData($('#formModi')[0]);
  var objAjax = $.ajax({
      type:'post',
      method:'post',
      enctype:'multipart/form-data',
      url:"./BDModi.php",
      processData:false,
      contentType:false,
      cache:false,
      data: datos,
      success: function(respuestaDelServer,estado) {
            cargaTabla();
            }
});  }
