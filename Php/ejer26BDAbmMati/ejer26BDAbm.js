$(document).ready(function(){
    //objetos para trabajar
    objCodArt = document.getElementById('codigoAlta');
    objNombre = document.getElementById('apellidoAlta');
    $("#enviarAlta").attr("disabled",true);
    $("#modalRespuesta").css("visibility","hidden");



    //dato inicial de orden
    $("#orden").val("apellido");

    //funciones de click orden
    $("#codigo").click(function(){
        $("#orden").val("codigo");
        cargaTabla();
    });
    $("#apellido").click(function(){
        $("#orden").val("apellido");
        cargaTabla();
    });
    $("#edad").click(function(){
        $("#orden").val("edad");
        cargaTabla();
    });
    $("#alta").click(function(){
        $("#orden").val("alta");
        cargaTabla();
    });
    $("#puesto").click(function(){
        $("#orden").val("puesto");
        cargaTabla();
    });
    $("#area").click(function(){
        $("#orden").val("area");
        cargaTabla();
    });

    //Corroboracion on keyup
    $("#codigoAlta").keyup(function(){
        validacionKeyup();
    });

    //Envio de formularios
    $("#enviarAlta").click(function(){

    });
});

//carga tabla
$("#cargarDatos").click(function(){
    cargaTabla();
});

//vacia tabla
$("#vaciar").click(function(){
    $("#cuerpoTabla").empty();
    $("#registros").empty();
});

//abre form de alta
$("#alta").click(function(){
    document.getElementById('contenedorBase').className="contDesactivo";
    document.getElementById('modalAlta').className="modalActiva";
    llenaEquiposAlta();
});

//envia alta
$("#enviarAlta").click(function(){
    alta();
});

//cierra form alta
$("#cerrarAlta").click(function(){
    document.getElementById('modalAlta').className="modalDesactivo";
    document.getElementById('contenedorBase').className="contActivo";
});

$("#cerrarModif").click(function(){
    document.getElementById('modalModificacion').className="modalDesModificacion";
    document.getElementById('contenedorBase').className="contActivoModificacion";
});

$("#cerrarRespuesta").click(function(){
    $("#modalRespuesta").css("visibility","hidden");
});

//funcion de carga de tabla
function cargaTabla(){
    $("#cuerpoTabla").empty();
    $("#cuerpoTabla").html("<h2>Esperando Respuesta ...</h2>");

    var objAjax = $.ajax({
        type:"get",
        url:"./consultaJugadores.php",
        data:
        {   orden: $("#orden").val(),
            filtro_codigo: $("#inputCodigo").val(),
            filtro_apellido: $("#inputApellido").val(),
            filtro_edad: $("#inputEdad").val(),
            filtro_alta: $("#inputAlta").val(),
            filtro_puesto: $("#inputPuesto").val(),
            filtro_area: $("#inputArea").val(),
        },
        success: function(respuestaDelServer,estado) {
            console.log(respuestaDelServer);
            $("#cuerpoTabla").empty();
            ojbJson = JSON.parse(respuestaDelServer);
            ojbJson.personas.forEach(function(valor,indice){
                //creo fila
                var objTr = document.createElement("tr");
                //creo primer dato y agrego a la fila
                var codigo = document.createElement("td");
                codigo.setAttribute("campo-dato", "codigo");
                codigo.innerHTML = valor.codigo;
                objTr.appendChild(codigo);
                //creo segundo dato y agrego a la fila
                var apellido = document.createElement("td");
                apellido.setAttribute("campo-dato", "apellido");
                apellido.innerHTML = valor.apellido;
                objTr.appendChild(apellido);
                //creo tercer dato y agrego a la fila
                var edad = document.createElement("td");
                edad.setAttribute("campo-dato", "edad");
                edad.innerHTML = valor.edad;
                objTr.appendChild(edad);
                //creo cuarto dato y agrego a la fila
                var falta = document.createElement("td");
                falta.setAttribute("campo-dato", "alta");
                falta.innerHTML = valor.alta;
                objTr.appendChild(falta);
                //creo quinto dato y agrego a la fila
                var puesto = document.createElement("td");
                puesto.setAttribute("campo-dato", "puesto");
                puesto.innerHTML = valor.puesto;
                objTr.appendChild(puesto);
                //creo sexto dato y agrego a la fila
                var area = document.createElement("td");
                area.setAttribute("campo-dato", "area");
                area.innerHTML = valor.area;
                objTr.appendChild(area);
                //creo PDF boton y agrego a la fila
                var pdf = document.createElement("td");
                pdf.setAttribute("campo-dato", "pdf");
                pdf.innerHTML = "<button id='pdf' style='padding: 10px; cursor:pointer;'>PDF</button>";
                pdf.onclick=function(){
                    cargarPdf(valor.codigo);
                }
                objTr.appendChild(pdf);
                //creo Modif boton y agrego a la fila
                var mod = document.createElement("td");
                mod.setAttribute("campo-dato", "modificacion");
                mod.innerHTML = "<button id='change' style='padding: 10px; cursor:pointer;'>Modificacion</button>";
                mod.onclick=function(){
                    $("#contenedorBase").addClass("contenedorDesBase");
                    $("#modalModificacion").addClass("modalModifActivo");
                    llenaEquiposModificacion();
                    CompletarFichaModificacion(valor.codigo);
                    $("#enviarModificacion").click(function(){
                        modificacion();
                    });
                }
                objTr.appendChild(mod);
                //creo Elim boton y agrego a la fila
                var elim = document.createElement("td");
                elim.setAttribute("campo-dato", "eliminar");
                elim.innerHTML = "<button id='delete' style='padding: 10px; cursor:pointer;'>Eliminacion</button>";
                elim.onclick=function(){
                    baja(valor.codigo);
                }
                objTr.appendChild(elim);

                //coloco en TBody
                document.getElementById("cuerpoTabla").appendChild(objTr);
            });
            $("#registros").html("Numero de Registros: " + ojbJson.cuentaRegistros);
        }
    });
}

//funcion modificacion
function modificacion(){
    var data = new FormData($("#formModificacion")[0]);

    var objAjax = $.ajax({
        type: 'post',
        method: 'post',
        enctype: 'multipart/form-data',
        url:"./modificacion.php",
        processData: false,
        contentType: false,
        cache: false,
        data: data,
    });

    cargaTabla();
}

//funcion para llenar con los equipos el alta
function llenaEquiposAlta(){
    var objAreas = $.ajax({
        type:"get",
        url:"./listaEquipos.php",
        data: {},
        success: function(respuestaDelServer,estado) {
            console.log(respuestaDelServer);
            ojbJsonAreas = JSON.parse(respuestaDelServer);
            ojbJsonAreas.area.forEach(function(valor,indice){
                var objetoOpcion = document.createElement("option");
                objetoOpcion.setAttribute("className", valor.area);
                objetoOpcion.setAttribute("name", valor.area);
                objetoOpcion.innerHTML = valor.area;
                document.getElementById("equipoAlta").appendChild(objetoOpcion);
            })
        }
    });
}

//funcion para llenar con los equipos la modi
function llenaEquiposModificacion(){
    var objAreas = $.ajax({
        type:"get",
        url:"./listaEquipos.php",
        data: {},
        success: function(respuestaDelServer,estado) {
            console.log(respuestaDelServer);
            ojbJsonAreas = JSON.parse(respuestaDelServer);
            ojbJsonAreas.area.forEach(function(valor,indice){
                var objetoOpcion = document.createElement("option");
                objetoOpcion.setAttribute("className", valor.area);
                objetoOpcion.setAttribute("name", valor.area);
                objetoOpcion.innerHTML = valor.area;
                document.getElementById("equipoModificacion").appendChild(objetoOpcion);
            })
        }
    });
}

//Funcion para completar los datos en el contenedor modal de Modificacion
function CompletarFichaModificacion(valor){
    var codigo = valor;
    var objAjax = $.ajax({
        type:"get",
        url:"./salidaJugadorModificar.php",
        data: {codigo: codigo},
        success: function(respuestaDelServer,estado) {
            console.log(respuestaDelServer);
            ojbJson = JSON.parse(respuestaDelServer);
            ojbJson.personas.forEach(function(valor,indice){
                $("#codigoModi").val(valor.codigo);
                $("#apellidoModi").val(valor.apellido);
                $("#edadModi").val(valor.edad);
                $("#altaModi").val(valor.alta);
                $("#puestomodi").val(valor.puesto);
                $("#areaModi").val(valor.area);
            })
        }
    });
}

//funcion de validacion keyup
function validacionKeyup(){
    if ((objCodArt.checkValidity() == true)) {
        $("#enviarAlta").attr("disabled",false);
    }else{
        $("#enviarAlta").attr("disabled",true);
    }
}

//funcion alta
function alta(){
    var objAjax = $.ajax({
        type:"get",
        url:"./alta.php",
        data:
        {
            codigo: $("#codigoAlta").val(),
            apellido: $("#apellidoAlta").val(),
            edad: $("#edadAlta").val(),
            alta: $("#altaAlta").val(),
            puesto: $("#puestoAlta").val(),
            area: $("#areaAlta").val(),
            pdf: $("#pdfAlta").val(),
        }
    });

    cargaTabla();
}

//funcion baja
function baja(codigo){
    var objAjax = $.ajax({
        type:"get",
        url:"./baja.php",
        data:
        {
            codigo: codigo
        }
    });

    cargaTabla();
}

//funcion Carga PDF
function cargarPdf(codigo){
    var objAjax = $.ajax({
        type:"get",
        url:"./datosDoc.php",
        data:
        {
            codigo: codigo
        },
        success: function(respuestaDelServer){
            console.log(respuestaDelServer);
            objPdf = JSON.parse(respuestaDelServer);
            console.log(respuestaDelServer);
            $("#modalRespuesta").css("visibility","visible");
            $("#bodyRespuesta").empty();
            $("#bodyRespuesta").html("<iframe width='100%' height='300px' src='data:application/pdf;base64,"+objPdf.documentoPdf+"'></iframe>");
        }
    });
}
