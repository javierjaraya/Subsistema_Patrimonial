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
             $( "#nuevoPredio" ).dialog({
              height: 400,
              width: 500,
              modal: true,
              buttons: {
                Aceptar: function() {
                  predio.aceptarIngresoPredio();
                  
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
            $("#comuna").autocomplete({
                source: "buscaComuna.php",
                minLength: 2,
            });
            console.log("Autocomplete iniciado");
//            $("#comuna").focusout(function(){
//                $.ajax({
//                    url:'alumno.php',
//                    type:'POST',
//                    dataType:'json',
//                    data:{ matricula:$('#matricula').val()}
//                }).done(function(respuesta){
//                    $("#nombre").val(respuesta.nombre);
//                });
//            });
        },
        
      };
    })();
