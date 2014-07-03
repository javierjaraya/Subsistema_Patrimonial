
console.log('iniciando eventos de caminos');
var flora = (function() {
    var confLoad = ({css: {border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'},
        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'}
    );
    var confFauna;
    return {
        cargarTabla: function() {
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var randomnumber = Math.random() * 11;
            $('#page-wrapper').load('Flora.php', function() {
                $("#tabla_contactos").dataTable(
                        {
                            "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
                            "sPaginationType": "bootstrap",
                            "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                            }
                        }

                );
                flora.autocompletePredioFiltro();
            });
            console.log('tabla cargada');
        },
        vaciaTabla: function(tabla) {
          console.log('tabla ocultada');
        },
        cancelarIngresoFlora: function(){
            console.log("Ingreso de flora cancelado");
            $.unblockUI();
        },
        autocompletePredioFiltro: function(){
            $("#idprediofiltro").autocomplete({
                source: "buscaPredio.php",
                minLength: 2,
//                appendTo: '#nuevoPredio',
                select: function(event, ui){
                    
                },
                change: function(event, ui){

                        
                   
                }
            });
        },
        mostrarModificar: function(idflora){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idFlora = idflora;
            console.log(idFlora);
            var datos = 'idflora=' + idFlora;
            console.log(datos);
            $.ajax({
                    type: "POST",
                    url: "modificarFlora.php",
                    data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#editFloraDialog').html(response);
                    
                    flora.modificarFlora();
                    
                    },
                    error: function() {
                    console.log("Error al ejecutar AJAX");
                    }
            });
        },
        
        modificarFlora: function() {
            $("#editFloraDialog").dialog({
                title: "Edición Flora",
                height: 560,
                width: 500,
                modal: true,
                position: {my: "center top", at: "center top", of: "#page-wrapper"},
                resizable: false,
                draggable: false,
                buttons: {
                    Actualizar: function() {
                        nombrefauna = $("#nombrefauna").val();
                        especie = $("#especie").val();
                        descripcion = $("#descripcion").val();
                        idflora = $("#idflora").val();

                        flora.aceptaModificarFlora();
                        
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
        
        aceptaModificarFlora: function() {
            $(document).ajaxStart($.blockUI(confLoad));
            var nombrefauna = $("#nombrefauna").val();
            var especie = $("#especie").val();
            var descripcion = $("#descripcion").val();
            var idflora = $("#idflora").val();

            $('#editFloraDialog').empty();
            
            var datos = 'idflora=' + idflora + '&nombreflora=' + nombrefauna + '&especie=' + especie + '&descripcion=' + descripcion;
            
            console.log("Datos nuevos: " + datos);
            $.ajax({
                    type: "POST",
                    url: "guardarCambiosActualizacionFlora.php",
                    data: datos,
                    success: function() {
                        $("#editFloraDialog").dialog("destroy");
                        
                        flora.cargarTabla();
                        flora.mostrarMensaje("Se editado una flora");
                    },
                    error: function() {
                        console.log("Error al ejecutar AJAX");
                        $('#page-wrapper').html('Consulta mal hecha');          
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
