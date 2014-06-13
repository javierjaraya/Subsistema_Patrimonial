/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type predio._L10.Anonym$0
 */


console.log('iniciando eventos de predio');
    var predio = (function() {
      var variablePublica = "podria iniciar un widget aqui";
       var confLoad = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'});
        var confPredio;
      return {
        /**
         * Método encargado de cargar tabla en el contenedor con el id
         * page-wrapper
         * @author Renato
         * @param {String} tabla
         * @returns {undefined}
         */
        cargarTabla: function() {
          $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
          var randomnumber=Math.random()*11;
          $('#page-wrapper').load('Predio.php',function(){ 
              $("#tabla_contactos").dataTable(
                  {
		"sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	}
                  
                  );
          predio.cargaFuncioneskeyPress();
          predio.cargaFuncionesAutocompletar();
          });
          console.log('tabla cargada');
        },
        /**
         * 
         * @param {type} people
         * @returns {undefined}
         */
        vaciaTabla: function(tabla) {
          console.log('tabla ocultada');
        },  
        cancelarIngresoPredio: function(){
            console.log("Ingreso de predio cancelado");
            $.unblockUI();
        },
        /**
         * metodo el cual recibirá los parametros, validará y enviará
         * por ajax a php
         * @returns {Boolean}
         */
        aceptarIngresoPredio: function(){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idPredio = $(".idpredio").val();
            nombre = $(".nombre").val();
            validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            superficie = $(".superficie").val();
            valorcomercial = $(".valorcomercial").val();
            idComuna = $(".id_comuna").attr("idcomuna");
            
            
            var datos = 'idpredio='+ idPredio + '&nombre=' + nombre + '&superficie=' + superficie + '&valorcomercial=' + valorcomercial + '&idcomuna=' + idComuna;
            $.ajax({
                type: "POST",
                url: "ingresaPredio.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    predio.cargarTabla();
                   // $(document).ajaxStop(predio.mostrarMensaje(""));
                    
//                    $('#page-wrapper').html(response);
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Error al Ingresar Predio');
                                  
                }
            });
            return false;
        },
        
        /**
         * metodo encargado de mostrar formulario para predio
         * @returns {undefined}
         */
        ingresaNuevoPredio: function(){
             $( "#nuevoPredio" ).dialog({
              title: "Nuevo Predio",
              height: 400,
              width: 500,
              modal: true,
              position: { my: "center top", at: "center top", of: "#page-wrapper" },
              resizable: false,
              buttons: {
                Aceptar: function() {
                  
                  predio.aceptarIngresoPredio();
                  $( this ).dialog( "close" );
            },
                Cancelar: function() {
                  $( this ).dialog( "close" );
                  
                }
              },
              close: function() {
        
              }
            });            
            console.log('abriendo contenedor nuevo predio');
            
            
        },
        modificarPredio: function(id){
            var idPredio = id;
            //predio.mostrarModificar();
            console.log(idPredio);
            var datos = 'idpredio='+ idPredio ;
            $.ajax({
                type: "POST",
                url: "modificarPredio.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#editPredioDialog').html(response);
                    
                    predio.mostrarModificar();
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
        },
        mostrarModificar: function(){
              $( "#editPredioDialog" ).dialog({            
              height: 400,
              width: 500,
              modal: true,
              buttons: {
                Actualizar: function() {
                  var bValid = true;
                  
            },
                Cancelar: function() {
                  $( this ).dialog( "close" );
                }
              },
              close: function() {
        
              }
            });
        },
        /**
         * Metodo encargado de inicializar el autocomplete
         * @returns {undefined}
         */
        cargaFuncionesAutocompletar: function(){
            $(".id_comuna").autocomplete({
                source: "buscaComuna.php",
                minLength: 2,
//                appendTo: '#nuevoPredio',
                select: function(event, ui){
                    $(".id_comuna").attr("idcomuna",ui.item.id);
                    $('#comuna_check').attr("src","../assets/ico/tick.gif");
                        $('#comuna_check').show();
                     $(".id_comuna").tooltip('destroy');
                },
                change: function(event, ui){
                    if(!ui.item){
                        $(".id_comuna").tooltip(
                                {
                                title: 'Seleccione una opción válida',
                                placement: 'right'});
                        /*
                         * Agrega check_error en input comuna
                         */
                        $('#comuna_check').attr("src","../assets/ico/error.png");
                        $('#comuna_check').show();
                        
                    }
                }
            }).css('z-index',1000);;
            console.log("Autocomplete iniciado");
            $(".id_comuna").focusout(function(){
                
                $.ajax({
                    url:'buscaComuna.php',
                    type:'POST',
                    dataType:'json',
                    data:{ nombreComuna:$('.id_comuna').val()}
                }).done(function(respuesta){
                    console.log("llamada post terminada");
                    if(respuesta.error == "1"){
                        console.log(respuesta.nombre + " y " + respuesta.id +" obtenidos");
                        $(".id_comuna").val(respuesta.nombre);
                        $(".id_comuna").attr("idcomuna", respuesta.id);
                        $(".id_comuna").tooltip('destroy');
                        $('#comuna_check').attr("src","../assets/ico/tick.gif");
                        $('#comuna_check').show();
                    }else{
                        console.log("No se encuentra comuna");
                        $(".id_comuna").tooltip(
                                {
                                title: 'Seleccione una opción válida',
                                placement: 'right'});
                        $('#comuna_check').attr("src","../assets/ico/error.png");
                        $('#comuna_check').show();
                    }
                });
            });
        },
        /**
         * Método encargado de validar el input de id_predio al momento de ingresar
         * una nueva tabla
         * @returns {undefined}
         */
        cargaFuncioneskeyPress: function(){
            $(".idpredio").focusout(function(){
                
                $.ajax({
                    url:'verificaIdPredio.php',
                    type:'POST',
                    dataType:'json',
                    data:{ idpredio:$('.idpredio').val()}
                }).done(function(respuesta){
                    console.log("llamada post terminada");
                    if(respuesta.error == "1"){
                        console.log("codigo retornado : "+respuesta.error);
                        $(".idpredio").tooltip('destroy');
                        $('#id_predio_check').attr("src","../assets/ico/tick.gif");
                        $('#id_predio_check').show();
                    }else{
                        console.log("el id ya esta en el sistema");
                        $(".idpredio").tooltip(
                                {
                                title: 'El id seleccionado no se encuentra disponible',
                                placement: 'right'});
                        $('#id_predio_check').attr("src","../assets/ico/error.png");
                        $('#id_predio_check').show();
                    }
                });
            });
        },
                
        mostrarMensaje: function(mensaje){
            confi = { 
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
            $.blockUI(confi);
        },
        
      };
    })();
