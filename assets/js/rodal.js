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
        aceptarIngresoRodal: function(){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idPredio = $(".idpredio").val();
            nombre = $(".nombre").val();
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
                  
                  if($("#id_rodal").attr("ok") == "true") ok_id_predio = true;
                  if($(".id_comuna").attr("ok") == "true" ) ok_comuna = true;
                  
                  val_nombre = $(".nombre").val();
                  val_superficie = $(".superficie").val();
                  val_valor = $(".valorcomercial").val();
                  
                  if(val_nombre != ""){
                      console.log("nombre es correcto")
                      $(".nombre").tooltip('destroy');
                      ok_nombre = true;
                  }else{
                      $(".nombre").tooltip(
                                    {
                                    title: 'El campo nombre no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_superficie != ""){
                      console.log("superficie es correcto")
                      $(".superficie").tooltip('destroy');
                      ok_superficie = true;
                  }else{
                      $(".superficie").tooltip(
                                    {
                                    title: 'El campo superficie es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_valor != ""){
                      console.log("valor comercial es correcto")
                      $(".valorcomercial").tooltip('destroy');
                      ok_valor = true;
                  }else{
                      $(".valorcomercial").tooltip(
                                    {
                                    title: 'El campo valor comercial es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  valida = valida && ok_id_predio && ok_comuna && ok_nombre && ok_superficie && ok_valor;
                  
                  if(valida){
                       rodal.aceptarIngresoRodal();
                       predio.cargarTabla();
                       $( this ).dialog( "close" );
                  }else{
                      switch(false){
                          case ok_id_predio: $(".idpredio").focus();
                              break;
                          case ok_nombre: $(".nombre").focus();
                              
                              break;
                          case ok_comuna: $(".id_comuna").focus();
                              break;
                          case ok_superficie: $(".superficie").focus();
                              break;
                          case ok_valor: $(".valorcomercial").focus();
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
                    $('#editPredioDialog').html(response);
                    
                    rodal.mostrarInventarios(idRodal);
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
        },
        mostrarInventarios: function (idRodal){
            $( "#editPredioDialog" ).dialog({
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
                    $('#editPredioDialog').html(response);
                    
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
              $( "#editPredioDialog" ).dialog({
              title: "Edición Rodal",
              height: 600,
              width: 500,
              modal: true,
             
              resizable: false,
              buttons: {
                Actualizar: function() {
                  
                  var bValid = true;
                  var idPredio = $("#idpredio").val();
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
                        + '&estado=' + estado;
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
        
        
        /**
         * Método encargado de validar el input de id_predio al momento de ingresar
         * una nueva tabla
         * @returns {undefined}
         */
        cargaFuncioneskeyPress: function(){
            $("#id_rodal_check").focusout(function(){
                var idRodal = $('#id_rodal_check').val();
                if (idRodal != ""){
                    $.ajax({
                        url:'verificaIdRodal.php',
                        type:'POST',
                        dataType:'json',
                        data:{ idrodal:$('#id_rodal_check').val()}
                    }).done(function(respuesta){
                        console.log(respuesta);
                        console.log("llamada post terminada");
                        
                        if(respuesta.error == "1"){
                            console.log("codigo retvac dornado : "+respuesta.error);
                            $(".idpredio").tooltip('destroy');
                            $(".idpredio").attr("ok", "true");
                            $('#id_predio_check').attr("src","../assets/ico/tick.gif");
                            $('#id_predio_check').show();
                        }else{
                            console.log("el id ya esta en el sistema");
                            $(".idpredio").tooltip('destroy');
                            $(".idpredio").tooltip(
                                    {
                                    title: 'El id seleccionado no se encuentra disponible',
                                    placement: 'bottom'});
                            $(".idpredio").attr("ok", "false");
                            $('#id_predio_check').attr("src","../assets/ico/error.png");
                            $('#id_predio_check').show();
                        }
                    });
                }else{
                    $('#id_predio_check').attr("src","../assets/ico/error.png");
                            $('#id_predio_check').show();
                            $(".idpredio").tooltip('destroy');
                    $(".idpredio").tooltip(
                                {
                                title: 'El Campo predio No puede estar vacio',
                                placement: 'bottom'});
                   $(".idpredio").attr("ok", "false"); 
                }
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
