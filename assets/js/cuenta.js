/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type cuenta._L10.Anonym$0
 */


console.log('iniciando eventos de cuenta');
    var cuenta = (function() {
      var variablePublica = "podria iniciar un widget aqui";
       var confLoad = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'});
        var confCuenta;
      return {
        /**
         * Método encargado de cargar tabla en el contenedor con el id
         * page-wrapper
         * @author Sebastian
         * @param {String} tabla
         * @returns {undefined}
         */
        cargarTabla: function() {
          $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
          //var randomnumber=Math.random()*11;
          $('#page-wrapper').load('Cuenta.php',function(){ 
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
        
        
        
        ingresaNuevaCuenta: function(dni){
            var dniCta = String(dni);
            
            console.log(dni);
            $( "#nuevaCuenta" ).dialog({
              title: "Ingresar Cuenta",
              height: 400,
              width: 500,
              modal: true,
              buttons: {
                Aceptar: function() {
                  cuenta.aceptarIngresoCuenta(dniCta);
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
        
        aceptarIngresoCuenta: function(dniCta){
            
            var idCuenta = $(".idCuenta").val();
            fechaCreacion = $(".fechaCreacion").val();
            password = $(".password").val();
            estado = $(".estado").val();
            idPerfil = $(".idPerfil").val(); 
            var datos = 'idCuenta='+ idCuenta + '&fechaCreacion=' + fechaCreacion + '&password=' + password
                    + '&estado=' + estado + '&idPerfil=' + idPerfil + '&dniCta='+ dniCta;
                    
            $.ajax({
                type: "POST",
                url: "ingresaCuenta.php",
                data: datos,
                success: function(response) {
                    //$('#showCuentaDialog').dialog({height: 300, width: 400});
                    console.log("Ajax ejecutado correctamente");
                    //empleado.cargarTabla();
                    $('#page-wrapper').html(response);
                    //cuenta.cargarTabla();
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Error al ingresar la Cuenta');
                                  
                }
            });
            return false;
        },
        
        modificarCuenta: function(id){            
            var idCuenta = id;
            //cuenta.mostrarModificar();
            //console.log(idCuenta);
            var datos = '&idCuenta='+ idCuenta ;
            $.ajax({
                type: "POST",
                url: "modificarCuenta.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#editCuentaDialog').html(response);
                    
                    cuenta.mostrarModificar();
                    cuenta.cargarTabla();
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
        },
        
        mostrarModificar: function(){
              $( "#editCuentaDialog" ).dialog({
              title: "Edición Cuenta",
              height: 500,
              width: 500,
              modal: true,
             
              resizable: false,
              buttons: {
                Actualizar: function() {
                  var bValid = true;
                  var idCuenta = $("#idCuenta").val();
                  
                    fechaCreacion = $("#fechaCreacion").val();
                    
                    password = $("#password").val();
                    idOriginal = $("#idOriginal").val();
                    idPerfil = $("#idPerfil").val();
                    console.log("cuenta:"+idCuenta);
                    estado = $("#estado").val();
            
            var datos = '&idCuenta='+ idCuenta + '&fechaCreacion=' + fechaCreacion + '&password=' + password + '&idOriginal=' + idOriginal+ '&idPerfil=' + idPerfil + '&estado=' + estado;
            $.ajax({
                type: "POST",
                url: "guardarCambiosActualizacionCuenta.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
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
        
        eliminarCuenta: function(id){
            var confirmacion = confirm("¿Está seguro que desea eliminar?");
            if(confirmacion){
                var idCuenta = id;
                //cuenta.mostrarModificar();
                console.log("Id cuenta a eliminar: "+idCuenta);
                var datos = 'idCuenta='+ idCuenta ;
                $.ajax({
                    type: "POST",
                    url: "eliminarCuenta.php",
                    data: datos,
                    success: function(response) {
                        console.log("Ajax ejecutado correctamente");
                        cuenta.cargarTabla();
                    },
                    error: function() {
                        console.log("Error al ejecutar AJAX");
                        //$('#page-wrapper').html('Consulta mal hecha');
                                      
                    }
                });
            }
            
        },
        
        mostrarCuenta: function(){
              $( "#showCuentaDialog" ).dialog({
              title: "Cuenta",
              height: 300,
              width: 400,
              modal: true,
             
              resizable: false,
              buttons: {
                Actualizar: function() {
                  var bValid = true;
                  var idCuenta = $("#idCuenta").val();
                  
                    fechaCreacion = $("#fechaCreacion").val();
                    
                    password = $("#password").val();
                    idOriginal = $("#idOriginal").val();
                    idPerfil = $("#idPerfil").val();
                    console.log("cuenta:"+idCuenta);
                    estado = $("#estado").val();
            
            var datos = '&idCuenta='+ idCuenta + '&fechaCreacion=' + fechaCreacion + '&password=' + password + '&idOriginal=' + idOriginal+ '&idPerfil=' + idPerfil + '&estado=' + estado;
            $.ajax({
                type: "POST",
                url: "guardarCambiosActualizacionCuenta.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#page-wrapper').html(response);
                    cuenta.cargarTabla();
                    
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
            $( this ).dialog( "close" );
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
              
      };
    })();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


