var lista = JSON.parse(Empleados);

lista.Persona.forEach(function(valor,indice){
    var opcion = document.createElement("option");
    opcion.setAttribute("className", valor.area);
    opcion.innerHTML = valor.area;
    document.getElementById("area").appendChild(opcion);
});

$("#btnmdl").click(function()){
  document.getElementById('contenedor').className="cdesactiva";
  document.getElementById('modal').className="mactiva";
});

$("#cerrar").click(function()){
  document.getElementById('modal').className='mdesactiva';
  document.getElementById('contenedor').className='cactiva';
});
