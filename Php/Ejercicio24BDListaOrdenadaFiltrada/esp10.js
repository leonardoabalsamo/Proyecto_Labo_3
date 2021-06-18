

$(document).ready(function() {
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
}); //cierro ready

$("#cargar").click(function(){
    cargaTabla();
});

$("#vaciar").click(function(){
    $("#bodytabla").empty();
    $("#totalRegistros").empty();
});

function cargaTabla(){
        $("#bodytabla").empty();
        $("#bodytabla").html("<h3>Esperando respuesta..</h3>");

        var objAjax = $.ajax({
              type:"get",
              url:"./basedatos.php",
              data: {
                      orden: $("#orden").val(),
                      inputcodigo: $("#inputcodigo").val(),
                      inputapellido: $("#inputapellido").val(),
                      inputedad: $("#inputedad").val(),
                      inputalta: $("#inputalta").val(),
                      inputpuesto: $("#inputpuesto").val(),
                      inputarea: $("#inputarea").val()

                    }, // El cliente pide los datos
              success: function(respuestaDelServer,estado) {
                          console.log(respuestaDelServer);
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

                                      document.getElementById("bodytabla").appendChild(fila);
                        });
                        $("#totalRegistros").html("Nro de registros: " + objJson.cuenta);
                      }

                  });
}
