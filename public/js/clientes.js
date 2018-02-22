(function(){
  'use strict';
  document.addEventListener('DOMContentLoaded', function(){

  var btnAgregar = document.getElementById('btnAgregar');

  btnAgregar.addEventListener('click', function () {
    mostrarform(true);
  });

  var cancelar = document.getElementById('cancelar');

  cancelar.addEventListener('click', function () {
    mostrarform(false);
  });

  //Función mostrar formulario
var mostrarform = function (flag){
  limpiar();
  if(flag)
  {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnAgregar").hide();
  }else{
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnAgregar").show();
  }
}

var limpiar = function(){
  $("#rut").val("");
  $("#nombre").val("");
  $("#direccion").val("");
  $("#telefono").val("");
  $("#idcliente").val("");
}

var listar = function() {
    var tabla = $('#tbllistado').DataTable(
      {
        "aProcessing": true, //Activamos el procesamiento del datables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
  		            'copyHtml5',
  		            { extend: 'excelHtml5', title: 'Listado' },
  		            'csvHtml5',
  		            {extend: 'pdf', title: 'Listado'}
  		        ],
  	    select: true,
        "ajax":
            {
              url: "clientes/listar",
              type: "post",
              dataType: "json",
              error: function(e){
                console.log(e.responseText);
              }
            },
        "bDestroy": true,
        "iDisplayLength": 8, //Paginación
        "order": [[0, "desc"]]  //Ordenar (columna, orden)
      }
    );
  }

var guardaryeditar = function(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
      url: "clientes/guardaryeditar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,

      success: function(datos)
      {
        bootbox.alert(datos);
        mostrarform(false);
        //tabla.ajax.reload();
        listar();
      }
    });
    limpiar();
};

//captura de id con evento delegato
$("#tbllistado").on("click", ".btn", function(e) {
  e.preventDefault();
  var cadena = $(this).val();
  if(cadena.substr(0,1) == '+'){
    editar(cadena.substr(2));
  }else{
    eliminar(cadena.substr(2));
  }
});

var editar = function(id){
    $.post("clientes/mostrar", {id : id}, function(data, status){
      data = JSON.parse(data);
      mostrarform(true);
      $("#rut").val(data.rut);
      $("#nombre").val(data.nombre);
      $("#direccion").val(data.direccion);
      $("#telefono").val(data.telefono);
      $("#idcliente").val(data.id);
    });
};

var eliminar = function(id)
{
  bootbox.confirm("¿Está seguro de desactivar el Articulo?", function(result){
    if(result)
    {
      $.post("clientes/eliminar", {id : id}, function(e){
        alert(e);
        //tabla.ajax.reload();
        listar();
      });
    }
  });
};

(function(){
      mostrarform(false);
      listar();
      $("#formulario").on("submit", function(e){
        guardaryeditar(e);
      });
})();//fin de funcion anonima

  }); //DOM content loaded
})();
