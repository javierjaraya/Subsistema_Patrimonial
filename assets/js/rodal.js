/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type predio._L10.Anonym$0
 */


console.log('iniciando eventos de rodal');
    var rodal = (function() {
      var variablePublica = "podria iniciar un widget aqui";
       var confLoad = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'});
        var confRodal;
      return {
        /**
         * Método encargado de cargar tabla en el contenedor con el id
         * page-wrapper
         * @author Ivan
         * @param {String} tabla
         * @returns {undefined}
         */
        cargarTabla: function() {
          console.log("Iniciando cargado de tabla");
          $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
          var randomnumber=Math.random()*11;
          $('#page-wrapper').load('Rodal.php',function(){ 
              $("#tabla_contactos").dataTable(
                  {
		"sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ Resultados por página"
		}
	}
                  
                  );
          
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
        aceptarIngresoRodal: function(datos){
            console.log(datos);
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            $.ajax({
                type: "POST",
                url: "ingresarRodal.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    predio.cargarTabla();
                    rodal.mostrarMensaje("Rodal agregado exitosamente!");
                    
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
         * 
         * @param {int} idPredio
         * @returns {undefined}
         */
        ingresaNuevoRodal: function(idPredio){
             $( "#nuevoRodal" ).dialog({
              title: "Nuevo Rodal para predio: "+idPredio,
              height: 560,
              width: 500,
              modal: true,
              position: { my: "center top", at: "center top", of: "#page-wrapper" },
              resizable: false,
              draggable: false,
              buttons: {
                Aceptar: function() {
                  console.log("Se inicia validacion");
                  valida = true;
                  ok_id_rodal = false;
                  ok_anio_plantacion = false;
                  ok_zona = false;
                  ok_superficie = false;
                  ok_valor = false;
                  ok_manejo = false;
                  
                  ok_id_rodal = ($("#id_rodal_nuevo").attr("ok") == "true")? true: false;
                  
                  val_anio_plantacion = $("#anioPlantacion_nuevo").val();
                  val_zona = $("#zonaCrecimiento_nuevo").val();
                  val_superficie = $("#superficie_nuevo").val();
                  val_valor = $("#valor_nuevo").val();
                  val_manejo = $("#manejo_nuevo").val();
                  val_especie = $("#id_especie_nuevo").val();
                  val_id_rodal = $("#id_rodal_nuevo").val()
                  
                  if(val_anio_plantacion != ""){
                      console.log("año es correcto")
                      $("#anioPlantacion_nuevo").tooltip('destroy');
                      ok_anio_plantacion = true;
                  }else{
                      $("#anioPlantacion_nuevo").tooltip(
                                    {
                                    title: 'El campo es numérico y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_zona != ""){
                      console.log("zona es correcto")
                      $("#zonaCrecimiento_nuevo").tooltip('destroy');
                      ok_zona = true;
                  }else{
                      $("#zonaCrecimiento_nuevo").tooltip(
                                    {
                                    title: 'El campo no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  if(val_superficie != ""){
                      console.log("superficie es correcto")
                      $("#superficie_nuevo").tooltip('destroy');
                      ok_superficie = true;
                  }else{
                      $("#superficie_nuevo").tooltip(
                                    {
                                    title: 'El campo valor comercial es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_valor != ""){
                      console.log("valor comercial es correcto")
                      $("#valor_nuevo").tooltip('destroy');
                      ok_valor = true;
                  }else{
                      $("#valor_nuevo").tooltip(
                                    {
                                    title: 'El campo valor comercial es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_manejo != ""){
                      console.log("manejo es correcto")
                      $("#manejo_nuevo").tooltip('destroy');
                      ok_manejo = true;
                  }else{
                      $("#manejo_nuevo").tooltip(
                                    {
                                    title: 'El campo no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  valida = valida && ok_id_rodal && ok_anio_plantacion && ok_zona && ok_superficie && ok_valor && ok_manejo;
                  
                  if(valida){
                       var datos = "?anioplantacion="+val_anio_plantacion
                               +"&zona="+val_zona
                               +"&superficie="+val_superficie
                               +"&valor="+val_valor
                               +"&manejo="+val_manejo
                               +"&idpredio="+idPredio
                               +"&especie="+val_especie
                               +"&idrodal="+val_id_rodal;
                       rodal.aceptarIngresoRodal(datos);
                       $( this ).dialog( "close" );
                  }else{
                      switch(false){
                          case ok_id_rodal: $("#id_rodal_nuevo").focus();
                              break;
                          case ok_manejo: $("#manejo_nuevo").focus();
                              break;
                          case ok_zona: $("#zonaCrecimiento_nuevo").focus();
                              break;
                          case ok_anio_plantacion: $("#anioPlantacion_nuevo").focus();
                              break;
                          case ok_superficie: $("#superficie_nuevo").focus();
                              break;
                          case ok_valor: $("#valor_nuevo").focus();
                              break;   
                      }
                  }
                 
                  
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
        
        cargarListaInventario: function(id){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idRodal= id;
            //predio.mostrarModificar();
            console.log(idRodal);
            var datos = 'idrodal='+ idRodal ;
            $.ajax({
                type: "POST",
                url: "listarInventarioRodal.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#listaInventarioDialog').html(response);
                    rodal.mostrarInventarios(idRodal);
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
        },
        mostrarInventarios: function (idRodal){
            $( "#listaInventarioDialog" ).dialog({
              title: "Inventarios del Rodal "+idRodal,
              height:550,
              width: 1120,
              modal: true,
              position: { my: "center top", at: "center top", of: "#page-wrapper" },
              resizable: false,
            });
            
        },
        modificarRodal: function(id){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idRodal = id;
            var datos = 'idrodal='+ idRodal ;
            $.ajax({
                type: "POST",
                url: "modificarRodal.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#editRodalDialog').html(response);
                    
                    rodal.mostrarModificar();
                    rodal.cargarTabla();
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
        },
        mostrarModificar: function(){
              $( "#editRodalDialog" ).dialog({
              title: "Edición Rodal",
              height: 600,
              width: 500,
              modal: true,
              resizable: false,
              buttons: {
                Actualizar: function() {
                  var confirmacion = confirm("¿Está seguro que desea actualizar?");
                  if(confirmacion){
                            var bValid = true;
                         var idPredio = $("#idpredio").val();
                         console.log("Predio: "+idPredio);
                         idRodal = $("#idrodal").val();
                         anioPlantacion = $("#anioPlantacion").val();
                         superficie = $("#superficie").val();
                         console.log(superficie);
                         valorComercial = $("#valorComercial").val();
                         idEspecieArborea = $("#idEspecieArborea").val();
                         manejo = $("#manejo").val();
                         zonaCrecimiento = $("#zonaCrecimiento").val();
                         estado = $("#estado").val();

                   var datos = 'idrodal='+ idRodal
                               + '&anioPlantacion=' + anioPlantacion 
                               + '&superficie=' + superficie 
                               + '&valorComercial=' + valorComercial 
                               + '&idEspecieArborea=' + idEspecieArborea
                               + '&manejo=' + manejo
                               + '&zonaCrecimiento=' + zonaCrecimiento
                               + '&estado=' + estado
                               + '&idpredio=' + idPredio;
                   $.ajax({
                       type: "POST",
                       url: "guardarCambiosActualizacionRodal.php",
                       data: datos,
                       success: function(response) {
                           console.log("Ajax ejecutado correctamente");
                           $('#page-wrapper').html(response);
                           rodal.cargarTabla();
                       },
                       error: function() {
                           console.log("Error al ejecutar AJAX");
                           $('#page-wrapper').html('Consulta mal hecha');
                       }
                   });

                   $( this ).dialog( "destroy" );
                           return true; 
                  }
                  
                  
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
        /**
         * Metodo encargado de eliminar un predio
         * @returns {undefined}
         */
        eliminarRodal: function(id){
            var confirmacion = confirm("¿Está seguro que desea eliminar?");
            if(confirmacion){
                var idRodal = id;
                //predio.mostrarModificar();
                console.log("Id rodal a eliminar: "+idRodal);
                var datos = 'idrodal='+ idRodal ;
                $.ajax({
                    type: "POST",
                    url: "eliminarRodal.php",
                    data: datos,
                    success: function(response) {
                        console.log("Ajax ejecutado correctamente");
                        rodal.cargarTabla();
                    },
                    error: function() {
                        console.log("Error al ejecutar AJAX");
                        //$('#page-wrapper').html('Consulta mal hecha');
                                      
                    }
                });
            }
            
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
