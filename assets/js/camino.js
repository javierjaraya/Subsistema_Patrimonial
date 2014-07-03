
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
                camino.cargaFuncioneskeyPressRodal();
                camino.cargaFuncionesAutocompletar();
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
                        tipoSuperficie = $(".superficie").val();
                        idPredio = $(".idpredio").val();

            var datos = 'longitud=' + longitud + '&tipoSuperficie=' + tipoSuperficie + '&idPredio=' + idPredio;
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
                        console.log("Se inicia validacion");
                        valida = true;
                        ok_longitud = false;
                        ok_tipo_superficie = false;
                        ok_id_predio = false;

                        if ($(".idpredio").attr("ok") == "true")
                            ok_id_predio = true;
                        val_longitud = $(".nombre").val();
                        val_tipo_superficie = $(".superficie").val();

                        //VALIDAMOS LA LONGITUD
                        if (val_longitud > 0) {
                            console.log("longitud correcta")
                            $(".longitud").tooltip('destroy');
                            ok_longitud = true;
                        } else {
                            $(".longitud").tooltip(
                                    {
                                        title: 'La longitud no puede ser cero',
                                        placement: 'bottom'});
                        }
                        //Validamos el campo de TIPO SUPERFICIE
                        if (val_tipo_superficie != "") {
                            console.log("tipo superficie es correcta")
                            $(".superficie").tooltip('destroy');
                            ok_tipo_superficie = true;
                        } else {
                            $(".superficie").tooltip(
                                    {
                                        title: 'El campo tipo superficie no puede ser vacio',
                                        placement: 'bottom'});
                        }

                        valida = valida && ok_id_predio && ok_longitud && ok_tipo_superficie;

                        //VERIFICAMOS SI TODO A SIDO VALIDADO CORRECTAMENTE
                        if (valida) {
                            $("#nuevoCamino").dialog("destroy");
                            camino.aceptarIngresoCamino();
                            camino.cargarTabla();
                            $(this).dialog("close");
                        } else {
                            switch (false) {
                                case ok_id_predio:
                                    $(".idpredio").focus();
                                    break;
                                case ok_longitud:
                                    $(".longitud").focus();

                                    break;
                                case ok_tipo_superficie:
                                    $(".superficie").focus();
                                    break;
                            }
                        }
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
        /**
         *
         */
        modificarCamino: function(id) {
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
                    camino.mostrarModificar();
                    camino.autocompleteModificar();
                    camino.cargaFuncioneskeyPressModificar();
                    },
                    error: function() {
                    console.log("Error al ejecutar AJAX");
                    }
            });

        },
        /**
         * Metodo encargado de mostrar el formulario para modificar un camino
         * */
        mostrarModificar: function() {
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
                        validacion = true;
                        ok_longitud = false;
                        ok_tipo_superficie = false;
                        ok_idOriginal = false;
                        ok_id_predio = false;

                        ok_longitud = $("#longitud").val();
                        idOriginal = $("#idOriginal").val();
                                        ok_tipo_superficie = $("#superficie").val();
                                ok_id_predio = $("#idpredio").val();

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
            var idCamino = $("#idcamino").val();

                                longitud = $("#longitud").val();
            idOriginal = $("#idOriginal").val();
                                tipo_superficie = $("#superficie").val();
                        id_predio = $("#idpredio").val();

            $('#editCaminoDialog').empty();
            var datos = 'idcamino=' + idCamino + '&longitud=' + longitud + '&superficie=' + tipo_superficie + '&idpredio=' + id_predio + '&idOriginal=' + idOriginal;
            console.log("Datos nuevos: " + datos);
            $.ajax({
                    type: "POST",
                    url: "guardarCambiosActualizacionCamino.php",
                    data: datos,
                    success: function() {
                    $("#editCaminoDialog").dialog("destroy");
                    camino.cargarTabla();
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
                console.log("Id camino a eliminar: " + idCamino);
                var datos = 'idcamino=' + idCamino;
                $.ajax({
                        type: "POST",
                        url: "eliminarCamino.php",
                        data: datos,
                    success: function(response) {
                        console.log("Ajax ejecutado correctamente");
                        camino.cargarTabla();
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
        cargaFuncionesAutocompletar: function(){
            $(".tipo_superficie").autocomplete({
                source: "buscaSuperficie.php",
                minLength: 2,
                select: function(event, ui){
                    $(".tipo_superficie").attr("tiposuperficie",ui.item.id);
                     $(".tipo_superficie").attr("ok", "true");
                    $('#superficie_check').attr("src","../assets/ico/tick.gif");
                        $('#superficie_check').show();
                     $(".tipo_superficie").tooltip('destroy');
                },
                change: function(event, ui){
                    if(!ui.item){
                        $(".tipo_superficie").tooltip(
                                {
                                title: 'Seleccione una opción válida',
                                placement: 'bottom'});
                        /*
                         * Agrega check_error en input comuna
                         */
                        $(".tipo_superficie").attr("ok", "false");
                        $('#comuna_check').attr("src","../assets/ico/error.png");
                        $('#comuna_check').show();
                        
                    }
                }
            }).css('z-index',1000);;
            console.log("Autocomplete iniciado");
            $(".tipo_superficie").focusout(function(){
               if($('.tipo_superficie').val()!=""){ 
                    $.ajax({
                        url:'buscaSuperficie.php',
                        type:'POST',
                        dataType:'json',
                        data:{ nombreSuperficie:$('.tipo_superficie').val()}
                    }).done(function(respuesta){
                        console.log("llamada post terminada");
                        if(respuesta.error == "1"){
                            console.log(respuesta.nombre + " y " + respuesta.id +" obtenidos");
                            $(".tipo_superficie").val(respuesta.nombre);
                            $(".tipo_superficie").attr("tiposuperficie", respuesta.id);
                            $(".tipo_superficie").attr("ok", "true");
                            $(".tipo_superficie").tooltip('destroy');
                            $('#comuna_check').attr("src","../assets/ico/tick.gif");
                            $('#comuna_check').show();
                        }else{
                            console.log("No se encuentra la superficie");
                            $(".tipo_superficie").tooltip('destroy');
                            $(".tipo_superficie").tooltip(
                                    {
                                    title: 'Seleccione una opción válida',
                                    placement: 'bottom'});
                            $(".tipo_superficie").attr("ok", "false");
                            $('#superficie_check').attr("src","../assets/ico/error.png");
                            $('#superficie_check').show();
                        }
                    });
               }else{
                   console.log("No se encuentra la superficie");
                            $(".tipo_superficie").tooltip(
                                    {
                                    title: 'El Campo Tipo Superficie no puede estar vacio',
                                    placement: 'bottom'});
                            $(".tipo_superficie").attr("ok", "false");
                            $('#superficie_check').attr("src","../assets/ico/error.png");
                            $('#superficie_check').show();
               }
             });
        },
        
        /**
         * 
         * @returns {undefined}
         */
        autocompleteModificar: function(){
            console.log("se inicia autocompletar modifica camino");
            $(".camino_modificar").autocomplete({
                source: "buscaSuperficie.php",
                minLength: 2,
//                appendTo: '#nuevoCamino',
                select: function(event, ui){
                    $(".superficie_modificar").attr("tiposuperficie",ui.item.id);
                     $(".superficie_modificar").attr("ok", "true");
                    $('#superficie_check_modificar').attr("src","../assets/ico/tick.gif");
                        $('#superficie_check_modificar').show();
                     $(".superficie").tooltip('destroy');
                },
                change: function(event, ui){
                    if(!ui.item){
                        $(".superficie_modificar").tooltip(
                                {
                                title: 'Seleccione una opción válida',
                                placement: 'bottom'});
                        /*
                         * Agrega check_error en input superficie
                         */
                        $(".superficie_modificar").attr("ok", "false");
                        $('#superficie_check_modificar').attr("src","../assets/ico/error.png");
                        $('#superficie_check_modificar').show();
                        
                    }
                }
            }).css('z-index',1000);
            console.log("Autocomplete superficie modificar cargado");
            $(".superficie_modificar").focusout(function(){
               if($('.superficie_modificar').val()!=""){ 
                    $.ajax({
                        url:'buscaSuperficie.php',
                        type:'POST',
                        dataType:'json',
                        data:{ nombreSuperficie:$('.superficie_modificar').val()}
                    }).done(function(respuesta){
                        console.log("llamada post terminada");
                        if(respuesta.error == "1"){
                            console.log(respuesta.nombre + " y " + respuesta.id +" obtenidos");
                            $(".superficie_modificar").val(respuesta.nombre);
                            $(".superficie_modificar").attr("tiposuperficie", respuesta.id);
                            $(".superficie_modificar").attr("ok", "true");
                            $(".superficie_modificar").tooltip('destroy');
                            $('#superficie_check_modificar').attr("src","../assets/ico/tick.gif");
                            $('#superficie_check_modificar').show();
                        }else{
                            console.log("No se encuentra superficie");
                            $(".superficie_modificar").tooltip('destroy');
                            $(".superficie_modificar").tooltip(
                                    {
                                    title: 'Seleccione una opción válida',
                                    placement: 'bottom'});
                            $(".superficie_modificar").attr("ok", "false");
                            $('#superficie_check_modificar').attr("src","../assets/ico/error.png");
                            $('#superficie_check_modificar').show();
                        }
                    });
               }else{
                   console.log("No se encuentra superficie");
                            $(".superficie_modificar").tooltip(
                                    {
                                    title: 'El Campo Tipo superficie no puede estar vacio',
                                    placement: 'bottom'});
                            $(".superficie_modificar").attr("ok", "false");
                            $('#superficie_check_modificar').attr("src","../assets/ico/error.png");
                            $('#superficie_check_modificar').show();
               }
             });
        }
    };
})();
