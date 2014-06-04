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
                        message: '<img src="assets/ico/ajax.gif" class="" />Cargando...'});
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
          $('#page-wrapper').load('vista/Predio.php');
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
            
            var idPredio = $(".idpredio").val();
            nombre = $(".nombre").val();
            validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            superficie = $(".superficie").val();
            valorcomercial = $(".valorcomercial").val();
            
            var datos = 'idpredio='+ idPredio + '&nombre=' + nombre + '&superficie=' + superficie + '&valorcomercial=' + valorcomercial;
            $.ajax({
                type: "POST",
                url: "vista/ingresaPredio.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#page-wrapper').html(response);
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            return false;
        },
        /**
         * metodo encargado de mostrar formulario para predio
         * @returns {undefined}
         */
        ingresaNuevoPredio: function(){
            confPredio = { 
                onOverlayClick: $.unblockUI,
                message: $('#nuevoPredio'),     
                        css:{                          
                            top: '60px',
                            'min-width': '200px',
                    
                        }
                    };
            $(document).ajaxStart($.blockUI(confPredio)).ajaxStop($.unblockUI);
            console.log('abriendo contenedor nuevo predio');
            
            
        },
        
      };
    })();
