/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type predio._L10.Anonym$0
 */


console.log('iniciando eventos de empleado');
    var empleado = (function() {
      var variablePublica = "podria iniciar un widget aqui";
       var confLoad = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'});
        var confEmpleado;
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
          //var randomnumber=Math.random()*11;
          $('#page-wrapper').load('Empleado.php',function(){ 
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
        
        aceptarIngresoEmpleado: function(){
            
            dni = $(".dni").val();
            nombre = $(".nombre").val();
            apPaterno = $(".apPaterno").val();
            apMaterno = $(".apMaterno").val();
            fechaIngreso = $(".fechaIngreso").val();
            var idCargo = $(".idCargo").val();
            var idCuenta = $(".idCuenta").val();
            
            var datos = '&dni='+ dni + '&nombre=' + nombre + '&apPaterno=' + apPaterno
                    + '&apMaterno=' + apMaterno + '$fechaIngreso' + fechaIngreso
                    + '$idCargo' + idCargo + '$idCuenta' + idCuenta;
            $.ajax({
                type: "POST",
                url: "vista/ingresaEmpleado.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#page-wrapper').html(response);
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Consulta mal ejecutada');
                                  
                }
            });
            return false;
        },
        /**
         * 
         * @param {type} people
         * @returns {undefined}
         */
        ingresaNuevoEmpleado: function(){
            confEmpleado = { 
                onOverlayClick: $.unblockUI,
                message: $('#nuevoEmpleado'),     
                        css:{                          
                            top: '60px',
                            'min-width': '200px',
                    
                        }
                    };
            $(document).ajaxStart($.blockUI(confEmpleado)).ajaxStop($.unblockUI);
            console.log('abriendo contenedor nuevo Empleado');
            
            
        },
              
      };
    })();
