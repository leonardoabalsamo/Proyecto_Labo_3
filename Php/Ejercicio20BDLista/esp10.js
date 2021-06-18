$(document).ready(function(){
    $("#input_orden").val("apellido");
});

$("#cargar").click(function(){
        $("#bodytabla").empty();
        $("#bodytabla").html("<h3>Esperando respuesta..</h3>");

        var objAjax = $.ajax({
              type:"get",
              url:"1wxrcvtq9n5vzkulrp3-mysql.services.clever-cloud.com",
              data: { }, // El cliente pide los datos
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

                                      document.getElementById("bodytabla").appendChild(fila);
                        });
                        $("#totalRegistros").html("Nro de registros: " + objJson.cuenta);}

                      });
                    });


$("#vaciar").click(function(){
    $("#bodytabla").empty();
    $("#totalRegistros").empty();
});


/*

var lista = JSON.parse(Empleados);

$("#cargar").click(function(){

    lista.Persona.forEach(function(valor,indice){

        var fila = document.createElement("tr");

        var ape = document.createElement("td");
        ape.setAttribute("campo-dato", "ape");
        ape.innerHTML = valor.ape;
        fila.appendChild(ape);

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

});

*/
