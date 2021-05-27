var lista = JSON.parse(Empleados);

lista.Persona.forEach(function(valor,indice){
    var opcion = document.createElement("option");
    opcion.setAttribute("className", valor.area);
    opcion.innerHTML = valor.area;
    document.getElementById("area").appendChild(opcion);
});
