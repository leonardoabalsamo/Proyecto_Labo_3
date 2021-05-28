

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

$("#vaciar").click(function(){
    $("#bodytabla").empty();
});

$("#cargaemp").click(function(){
    document.getElementById('contenedor').className="cdesactiva";
    document.getElementById('modal').className="mactiva";
});

$("#cerrar").click(function(){
    document.getElementById('modal').className="mdesactiva";
    document.getElementById('contenedor').className="cactiva";
});
