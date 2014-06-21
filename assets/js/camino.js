
console.log('iniciando eventos de caminos');
var camino = (function() {
    var confLoad = ({css: {border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'},
        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'}
    );
    var confCamino;
    return {
        cargarTabla: function() {
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var randomnumber = Math.random() * 11;
            $('#page-wrapper').load('Camino.php', function() {
                $("#tabla_contactos").dataTable(
                        {
                            "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
                            "sPaginationType": "bootstrap",
                            "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                            }
                        }

                );
            });
            console.log('tabla cargada');
        },
        vaciaTabla: function(tabla) {
          console.log('tabla ocultada');
        },
        cancelarIngresoCamino: function(){
            console.log("Ingreso de camino cancelado");
            $.unblockUI();
        },
        aceptarIngresoCamino: function(){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idCamino = $(".idcamino").val();
            longitud = $(".longitud").val();
            tipoSuperficie = $(".tipoSuperficie").val();
            idPredio = $(".idpredio").val();
            
            
            var datos = 'idcamino='+ idCamino + '&longitud=' + longitud + '&tipoSuperficie=' + tipoSuperficie + '&idPredio=' + idPredio;
            $.ajax({
                type: "POST",
                url: "ingresarCamino.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    camino.cargarTabla();
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Error al Ingresar Camino');
                                  
                }
            });
            return false;
        },
                
        ingresaNuevoCamino: function() {
            $("#nuevoCamino").dialog({
                title: "Nuevo Camino",
                height: 400,
                width: 500,
                modal: true,
                position: {my: "center top", at: "center top", of: "#page-wrapper"},
                resizable: false,
                buttons: {
                    Aceptar: function() {

                        camino.aceptarIngresoCamino();
                        //$(this).dialog("close");
                    },
                    Cancelar: function() {
                        $(this).dialog("close");

                    }
                },
                close: function() {

                }
            });
            console.log('abriendo contenedor nuevo camino');
        }
    };
})();
