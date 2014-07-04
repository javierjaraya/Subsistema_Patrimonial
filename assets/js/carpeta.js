/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type cuenta._L10.Anonym$0
 */


console.log('iniciando eventos de cuenta');
    var carpeta = (function() {
      var variablePublica = "podria iniciar un widget aqui";
       var confLoad = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'});
        var confCarpeta;
      return {
        /**
         * Método encargado de cargar tabla en el contenedor con el id
         * page-wrapper
         * @author Sebastian
         * @param {String} tabla
         * @returns {undefined}
         */
        cargarTablaPredio: function() {
          $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
          //var randomnumber=Math.random()*11;
          $('#page-wrapper').load('abogadoPredio.php',function(){ 
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
        
        cargarTabla: function() {
          $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
          //var randomnumber=Math.random()*11;
          $('#page-wrapper').load('CarpetaLegal.php',function(){ 
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
        
        
        
        ingresaNuevaCarpeta: function(){
            $( "#nuevaCarpeta" ).dialog({
              title: "Ingresar Carpeta",
              height: 400,
              width: 500,
              modal: true,
              buttons: {
                Aceptar: function() {
                  carpeta.aceptarIngresoCarpeta();
                  $( this ).dialog( "close" );
            },
                Cancelar: function() {
                  $( this ).dialog( "close" );
                  
                }
              },
              close: function() {
        
              }
            });            
            console.log('abriendo contenedor nueva Cuenta');
                       
        },
        
        aceptarIngresoCarpeta: function(){
            
            var codigo = $("#codigo_carpeta").val();
            fechaInscripcion = $("#fecha_carpeta").val();
            rol = $("#rol_carpeta").val();
            conservador = $("#conservador_carpeta").val();
            contribucion = $("#contribucion_carpeta").val();
            idPredio = $("#id_predio_carpeta").val();
            estado = $("#estado_carpeta").val();
                     
            
            var datos = 'codigo='+ codigo + '&fechaInscripcion=' + fechaInscripcion + '&rol=' + rol
                    + '&conservador=' + conservador + '&contribucion=' + contribucion + '&idPredio='
                    + idPredio + '&estado=' + estado;
            
            console.log("DATOS " +datos);
            
            $.ajax({
                type: "POST",
                url: "ingresaCarpeta.php",
                data: datos,
                success: function(response) {
                    //$('#showCuentaDialog').dialog({height: 300, width: 400});
                    console.log("Ajax ejecutado correctamente aceptarIngresarCarpeta");
                    console.log(response);// $('#page-wrapper').html(response);
                    carpeta.cargarTabla();
                   $("#nuevaCarpeta").dialog("destroy");
                   
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Error al ingresar la Cuenta');
                                  
                }
            });
            return false;
        },
        
        modificarCarpeta: function(cod){            
            var codigo = cod;
            //cuenta.mostrarModificar();
            console.log(codigo);
            var datos = 'Codigo='+ codigo ;
            $.ajax({
                type: "POST",
                url: "modificarCarpeta.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente (modificarCarpeta)");
                    $('#editCarpetaDialog').html(response);
                    
                    carpeta.mostrarModificar();
                    carpeta.cargarTabla();
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
        },
        
        mostrarModificar: function(){
              $( "#editCarpetaDialog" ).dialog({
              title: "Edición Carpeta",
              height: 500,
              width: 500,
              modal: true,
             
              resizable: false,
              buttons: {
                Actualizar: function() {
                  var bValid = true;
                  var idOriginal = $("#idOriginal").val();
                    codigo = $("#codigo").val();                 
                    fechaInscripcion = $("#fechaInscripcion").val();
                    rol = $("#rol").val();
                    conservador = $("#conservador").val();
                    contribucion = $("#contribucion").val();
                    idPredio = $("#idPredio").val();
                    estado = $("#estado").val();
                    
                    console.log("codigo: "+codigo);
                    
            
            var datos = 'idOriginal=' + idOriginal +'&codigo='+ codigo + '&fechaInscripcion=' + fechaInscripcion + 
                    '&rol=' + rol + '&conservador=' + conservador + '&contribucion=' + 
                    contribucion + '&idPredio=' + predio + '&estado=' + estado;
            $.ajax({
                type: "POST",
                url: "guardarCambiosActualizacionCarpeta.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente (mostrarModificar)");
                    $('#page-wrapper').html(response);
                    cuenta.cargarTabla();
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
            $( this ).dialog( "destroy" );
                    return true;
                  
            }
            ,
                Cancelar: function() {
                  $( this ).dialog( "close" );
                }
              },
              close: function() {
        $( this ).dialog( "close" );
              }
            });
        },
        
        eliminarCarpeta: function(cod){
            var confirmacion = confirm("¿Está seguro que desea eliminar?");
            if(confirmacion){
                var codigo = cod;
                //console.log("codigo a eliminar: "+ codigo);
                var datos = 'Codigo=' + codigo;
                $.ajax({
                    type: "POST",
                    url: "eliminarCarpeta.php",
                    data: datos,
                    success: function(response) {
                        console.log("Ajax ejecutado correctamente");
                        carpeta.cargarTabla();
                    },
                    error: function() {
                        console.log("Error al ejecutar AJAX");
                        //$('#page-wrapper').html('Consulta mal hecha');
                                      
                    }
                });
            }
            
        },
        
              
      };
    })();

