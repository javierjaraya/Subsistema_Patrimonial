
console.log('iniciando eventos de caminos');
var camino = (function() {
    var variablePublica = "podria iniciar un widget aqui";
    /*
     * Configuración de UIBLOCK para la carga de un contenedor
     * @type type
     */
    var confLoad = ({css: {border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'},
        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'});
    /*
     * Configuracion de UIBLOCK para mostrar un mensaje
     * @type type
     */
    var confMsg = {
        message: $('notify_correct'),
        fadeIn: 700,
        fadeOut: 700,
        timeout: 2000,
        showOverlay: false,
        centerY: false,
        css: {
            background: "url('assets/ico/check')",
            width: '350px',
            top: '10px',
            left: '',
            right: '10px',
            border: 'none',
            padding: '5px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .6,
            color: '#fff'
        }
    };
    var idCaminoModificar;
    return {
        /**
         * Método que cargar tabla en el contenedor con el id "page-wrapper"
         * @author Javier
         * @param {String} tabla
         * @returns {undefined}
         */
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
                camino.cargaFuncionesAutocompletar();
                camino.autocompleteCaminoFiltro();
            });
            console.log('tabla cargada');
        },
        vaciaTabla: function(tabla) {
            console.log('tabla ocultada');
        },
        cancelarIngresoCamino: function() {
            console.log("Ingreso de camino cancelado");
            $.unblockUI();
        },
        /**
         * metodo el cual recibirá los parametros, validará y enviará
         * por ajax a php
         * @returns {Boolean}
         */
        aceptarIngresoCamino: function() {
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var longitud = $(".longitud").val();
            var tipoSuperficie = $(".superficie").val();
            var idPredio = $(".idpredio").val();

            var datos = 'longitud=' + longitud + '&tipoSuperficie=' + tipoSuperficie + '&idPredio=' + idPredio;
            
            console.log("datos " + datos);
            $.ajax({
                    type: "POST",
                    url: "ingresarCamino.php",
                    data: datos,
                    success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $("#nuevoCamino").dialog("destroy");
                    camino.cargarTabla();
                    camino.mostrarMensaje("Se agrego un camino");
                    },
                    error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Error al Ingresar Camino');
                                  
                    }
            });
            return false;
        },
        /**
         * metodo encargado de mostrar formulario para ingresar
         * un nuevo camino
         * @returns {undefined}
         */
        ingresaNuevoCamino: function() {
            $("#nuevoCamino").dialog({
                title: "Nuevo Camino",
                height: 400,
                width: 500,
                modal: true,
                position: {my: "center top", at: "center top", of: "#page-wrapper"},
                draggable: false,
                resizable: false,
                buttons: {
                    Aceptar: function() {
                        camino.aceptarIngresoCamino();
                        //camino.cargarTabla();
                        $(this).dialog("close");
                    },
                    Cancelar: function() {
                        $(this).dialog("close");

                    }
                },
                close: function() {

                }
            });
            console.log('abriendo contenedor nuevo camino');
        },
        autocompleteCaminoFiltro: function(){
            $("#idpredio").autocomplete({
                source: "buscaPredio.php",
                minLength: 2,
//                appendTo: '#nuevoPredio',
                select: function(event, ui){
                    
                },
                change: function(event, ui){

                        
                   
                }
            });
        },
        /**
         *Metodo encargado de mostrar la ventada de edicion de caminos
         */
        mostrarModificar: function(id) {
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idCamino = id;
            console.log(idCamino);
            var datos = 'idcamino=' + idCamino;
            $.ajax({
                    type: "POST",
                    url: "modificarCamino.php",
                    data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#editCaminoDialog').html(response);
                    camino.modificarCamino();
                    
                    },
                    error: function() {
                    console.log("Error al ejecutar AJAX");
                    }
            });

        },
        /**
         * Metodo encargado de validar el formulario para modificar un camino
         * */
        modificarCamino: function() {
            $("#editCaminoDialog").dialog({
                title: "Edición Camino",
                height: 560,
                width: 500,
                modal: true,
                position: {my: "center top", at: "center top", of: "#page-wrapper"},
                resizable: false,
                draggable: false,
                buttons: {
                    Actualizar: function() {
                        longitud = $("#longitud").val();
                        idsuperficie = $("#tipoSuperficie").val();
                        idpredio = $("#predio").val();
                        idcamino = $("#idcamino").val();

                        camino.aceptaModificarCamino();
                        
                        $(this).dialog("close");
                        return true;

                    }
                    ,
                    Cancelar: function() {
                        $(this).dialog("close");
                    }
                },
                close: function() {
                    $(this).dialog("close");
                }
            });
        },
        
        aceptaModificarCamino: function() {
            $(document).ajaxStart($.blockUI(confLoad));
            var longitud = $("#longitud").val();
            var idsuperficie = $("#tipoSuperficie").val();
            var idpredio = $("#predio").val();
            var idcamino = $("#idcamino").val();

            $('#editCaminoDialog').empty();
            var datos = 'idcamino=' + idcamino + '&longitud=' + longitud + '&superficie=' + idsuperficie + '&idpredio=' + idpredio;
            
            console.log("Datos nuevos: " + datos);
            $.ajax({
                    type: "POST",
                    url: "guardarCambiosActualizacionCamino.php",
                    data: datos,
                    success: function() {
                        $("#editCaminoDialog").dialog("destroy");
                        camino.cargarTabla();
                        camino.mostrarMensaje("Se editado un camino");
                    },
                    error: function() {
                        console.log("Error al ejecutar AJAX");
                        $('#page-wrapper').html('Consulta mal hecha');          
                    }
            });
        },
        /**
         * Metodo encargado de eliminar un camino
         * @returns {undefined}
         */
        eliminarCamino: function(id) {
            var confirmacion = confirm("¿Está seguro que desea eliminar el camino?");
            if (confirmacion) {
                var idCamino = id;
                
                var datos = 'idcamino=' + idCamino;
                
                console.log(datos);
                
                $.ajax({
                        type: "POST",
                        url: "eliminarCamino.php",
                        data: datos,
                    success: function(response) {
                        console.log("Ajax ejecutado correctamente");
                        camino.cargarTabla();
                        camino.mostrarMensaje("Se a eliminado el camino");
                    },
                        error: function() {
                        console.log("Error al ejecutar AJAX");
                        }
                });
            }

        },
        /**
         * Metodo encargado de inicializar el autocomplete
         * @returns {undefined}
         */
        cargaFuncionesAutocompletar: function() {
            $(".tipo_superficie").autocomplete({
                source: "buscaSuperficie.php",
                minLength: 2,
                select: function(event, ui) {
                    $(".tipo_superficie").attr("tiposuperficie", ui.item.id);
                    $(".tipo_superficie").attr("ok", "true");
                    $('#superficie_check').attr("src", "../assets/ico/tick.gif");
                    $('#superficie_check').show();
                    $(".tipo_superficie").tooltip('destroy');
                },
                change: function(event, ui) {
                    if (!ui.item) {
                        $(".tipo_superficie").tooltip(
                                {
                                    title: 'Seleccione una opción válida',
                                    placement: 'bottom'});
                        /*
                         * Agrega check_error en input comuna
                         */
                        $(".tipo_superficie").attr("ok", "false");
                        $('#comuna_check').attr("src", "../assets/ico/error.png");
                        $('#comuna_check').show();

                    }
                }
            }).css('z-index', 1000);
            ;
            console.log("Autocomplete iniciado");
            $(".tipo_superficie").focusout(function() {
                if ($('.tipo_superficie').val() != "") {
                    $.ajax({
                        url: 'buscaSuperficie.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {nombreSuperficie: $('.tipo_superficie').val()}
                    }).done(function(respuesta) {
                        console.log("llamada post terminada");
                        if (respuesta.error == "1") {
                            console.log(respuesta.nombre + " y " + respuesta.id + " obtenidos");
                            $(".tipo_superficie").val(respuesta.nombre);
                            $(".tipo_superficie").attr("tiposuperficie", respuesta.id);
                            $(".tipo_superficie").attr("ok", "true");
                            $(".tipo_superficie").tooltip('destroy');
                            $('#comuna_check').attr("src", "../assets/ico/tick.gif");
                            $('#comuna_check').show();
                        } else {
                            console.log("No se encuentra la superficie");
                            $(".tipo_superficie").tooltip('destroy');
                            $(".tipo_superficie").tooltip(
                                    {
                                        title: 'Seleccione una opción válida',
                                        placement: 'bottom'});
                            $(".tipo_superficie").attr("ok", "false");
                            $('#superficie_check').attr("src", "../assets/ico/error.png");
                            $('#superficie_check').show();
                        }
                    });
                } else {
                    console.log("No se encuentra la superficie");
                    $(".tipo_superficie").tooltip(
                            {
                                title: 'El Campo Tipo Superficie no puede estar vacio',
                                placement: 'bottom'});
                    $(".tipo_superficie").attr("ok", "false");
                    $('#superficie_check').attr("src", "../assets/ico/error.png");
                    $('#superficie_check').show();
                }
            });
        },
        /**
         * 
         * @returns {undefined}
         */
        autocompleteModificar: function() {
            console.log("se inicia autocompletar modifica camino");
            $(".camino_modificar").autocomplete({
                source: "buscaSuperficie.php",
                minLength: 2,
//                appendTo: '#nuevoCamino',
                select: function(event, ui) {
                    $(".superficie_modificar").attr("tiposuperficie", ui.item.id);
                    $(".superficie_modificar").attr("ok", "true");
                    $('#superficie_check_modificar').attr("src", "../assets/ico/tick.gif");
                    $('#superficie_check_modificar').show();
                    $(".superficie").tooltip('destroy');
                },
                change: function(event, ui) {
                    if (!ui.item) {
                        $(".superficie_modificar").tooltip(
                                {
                                    title: 'Seleccione una opción válida',
                                    placement: 'bottom'});
                        /*
                         * Agrega check_error en input superficie
                         */
                        $(".superficie_modificar").attr("ok", "false");
                        $('#superficie_check_modificar').attr("src", "../assets/ico/error.png");
                        $('#superficie_check_modificar').show();

                    }
                }
            }).css('z-index', 1000);
            console.log("Autocomplete superficie modificar cargado");
            $(".superficie_modificar").focusout(function() {
                if ($('.superficie_modificar').val() != "") {
                    $.ajax({
                        url: 'buscaSuperficie.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {nombreSuperficie: $('.superficie_modificar').val()}
                    }).done(function(respuesta) {
                        console.log("llamada post terminada");
                        if (respuesta.error == "1") {
                            console.log(respuesta.nombre + " y " + respuesta.id + " obtenidos");
                            $(".superficie_modificar").val(respuesta.nombre);
                            $(".superficie_modificar").attr("tiposuperficie", respuesta.id);
                            $(".superficie_modificar").attr("ok", "true");
                            $(".superficie_modificar").tooltip('destroy');
                            $('#superficie_check_modificar').attr("src", "../assets/ico/tick.gif");
                            $('#superficie_check_modificar').show();
                        } else {
                            console.log("No se encuentra superficie");
                            $(".superficie_modificar").tooltip('destroy');
                            $(".superficie_modificar").tooltip(
                                    {
                                        title: 'Seleccione una opción válida',
                                        placement: 'bottom'});
                            $(".superficie_modificar").attr("ok", "false");
                            $('#superficie_check_modificar').attr("src", "../assets/ico/error.png");
                            $('#superficie_check_modificar').show();
                        }
                    });
                } else {
                    console.log("No se encuentra superficie");
                    $(".superficie_modificar").tooltip(
                            {
                                title: 'El Campo Tipo superficie no puede estar vacio',
                                placement: 'bottom'});
                    $(".superficie_modificar").attr("ok", "false");
                    $('#superficie_check_modificar').attr("src", "../assets/ico/error.png");
                    $('#superficie_check_modificar').show();
                }
            });
        },
        
        mostrarMensaje: function(mensaje){
            $('#notify_correct').html(mensaje);
            confi = { 
            message: $('#notify_correct'), 
            fadeIn: 700, 
            fadeOut: 700, 
            timeout: 4000, 
            showOverlay: false, 
            centerY: false, 
            css: { 
                
                    width: '350px', 
                    top: '60px', 
                    left: '', 
                    right: '20px', 
                    border: 'none', 
                    padding: '5px', 
                    backgroundColor: '#000', 
                    '-webkit-border-radius': '10px', 
                    '-moz-border-radius': '10px', 
                    color: '#fff' 
                } 
            };
            $.blockUI(confi);
        }
    };
})();
