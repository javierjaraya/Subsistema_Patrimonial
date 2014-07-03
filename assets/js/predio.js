/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type predio._L10.Anonym$0
 */


console.log('iniciando eventos de predio');
    var predio = (function() {
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
		        color: '#fff' },
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
            var idPredioModificar;
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
			"sLengthMenu": "_MENU_ Resultados por página"
		}
	}
                  
                  );
          predio.cargaFuncioneskeyPress();
          predio.cargaFuncioneskeyPressRodal();
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
            superficie = $(".superficie").val();
            valorcomercial = $(".valorcomercial").val();
            idComuna = $(".id_comuna").attr("idcomuna");
            zona = $("#zona_agregar").val();
            
            var datos = 'idpredio='+ idPredio + '&nombre=' + nombre + '&superficie=' + superficie + '&valorcomercial=' + valorcomercial + '&idcomuna=' + idComuna + '&zona' + zona;
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
         * metodo encargado de mostrar formulario para ingresar
         * un nuevo predio
         * @returns {undefined}
         */
        ingresaNuevoPredio: function(){
             $( "#nuevoPredio" ).dialog({
              title: "Nuevo Predio",
              height: 560,
              width: 500,
              modal: true,
              position: { my: "center top", at: "center top", of: "#page-wrapper" },
              draggable: false,
              resizable: false,
              buttons: {
                Aceptar: function() {
                  console.log("Se inicia validacion");
                  valida = true;
                  ok_id_predio = false;
                  ok_comuna = false;
                  ok_nombre = false;
                  ok_superficie = false;
                  ok_valor = false;
                  
                  if($(".idpredio").attr("ok") == "true") ok_id_predio = true;
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
                      $( "#nuevoPredio" ).dialog("destroy");
                       predio.aceptarIngresoPredio();
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
        modificarPredio: function(id){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idPredio = id;
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
                    predio.autocompleteModificar();
                    predio.cargaFuncioneskeyPressModificar();
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
        },
        
        mostrarModificar: function(){
              $( "#editPredioDialog" ).dialog({
              title: "Edición Predio",
              height: 560,
              width: 500,
              modal: true,
              position: { my: "center top", at: "center top", of: "#page-wrapper" },
              resizable: false,
              draggable: false,
              buttons: {
                Actualizar: function() {
                    var confirmacion = confirm("¿Está seguro que desea actualizar?");
                if(confirmacion){
                validacion = true;
                ok_nombre = false;
                ok_comuna = false;
                ok_idOriginal = false;
                ok_superficie = false;
                ok_valorcomercial = false;
                ok_estado = false;
                ok_nombre = ($("#nombre").attr("ok")== true)? true : false;  
                comuna = $("#comuna").val();
                idOriginal = $("#idOriginal").val();
                superficie = $("#superficie").val();
                valorcomercial = $("#valorcomercial").val();
                estado = $("#estado").val();
                
                predio.aceptaModificarPredio();   
                
            $( this ).dialog( "close" );
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
        
        aceptaModificarPredio: function(){
            $(document).ajaxStart($.blockUI(confLoad));
                  var idPredio = $("#idpredio").val();
                  
                    nombre = $("#nombre").val();
                    
                    comuna = $("#comuna").val();
                    idOriginal = $("#idOriginal").val();
                    superficie = $("#superficie").val();
                    valorcomercial = $("#valorcomercial").val();
                    estado = $("#estado").val();
                   $('#editPredioDialog').empty();
            var datos = 'idpredio='+ idPredio + '&nombre=' + nombre + '&superficie=' + superficie + '&valorcomercial=' + valorcomercial + '&comuna=' + comuna + '&idOriginal=' + idOriginal+ '&estado=' + estado;
            console.log("Datos nuevos: " + datos);
            $.ajax({
                type: "POST",
                url: "guardarCambiosActualizacionPredio.php",
                data: datos,
                success: function() {
                $( "#editPredioDialog" ).dialog( "destroy" );
                    predio.cargarTabla();
                    
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
        },
        /**
         * Metodo encargado de eliminar un predio
         * @returns {undefined}
         */
        eliminarPredio: function(id){
            var confirmacion = confirm("¿Está seguro que desea eliminar?");
            if(confirmacion){
                var idPredio = id;
                //predio.mostrarModificar();
                console.log("Id predio a eliminar: "+idPredio);
                var datos = 'idpredio='+ idPredio ;
                $.ajax({
                    type: "POST",
                    url: "eliminarPredio.php",
                    data: datos,
                    success: function(response) {
                        console.log("Ajax ejecutado correctamente");
                        predio.cargarTabla();
                    },
                    error: function() {
                        console.log("Error al ejecutar AJAX");
                        //$('#page-wrapper').html('Consulta mal hecha');
                                      
                    }
                });
            }
            
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
                     $(".id_comuna").attr("ok", "true");
                    $('#comuna_check').attr("src","../assets/ico/tick.gif");
                        $('#comuna_check').show();
                     $(".id_comuna").tooltip('destroy');
                },
                change: function(event, ui){
                    if(!ui.item){
                        $(".id_comuna").tooltip(
                                {
                                title: 'Seleccione una opción válida',
                                placement: 'bottom'});
                        /*
                         * Agrega check_error en input comuna
                         */
                        $(".id_comuna").attr("ok", "false");
                        $('#comuna_check').attr("src","../assets/ico/error.png");
                        $('#comuna_check').show();
                        
                    }
                }
            }).css('z-index',1000);;
            console.log("Autocomplete iniciado");
            $(".id_comuna").focusout(function(){
               if($('.id_comuna').val()!=""){ 
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
                            $(".id_comuna").attr("ok", "true");
                            $(".id_comuna").tooltip('destroy');
                            $('#comuna_check').attr("src","../assets/ico/tick.gif");
                            $('#comuna_check').show();
                        }else{
                            console.log("No se encuentra comuna");
                            $(".id_comuna").tooltip('destroy');
                            $(".id_comuna").tooltip(
                                    {
                                    title: 'Seleccione una opción válida',
                                    placement: 'bottom'});
                            $(".id_comuna").attr("ok", "false");
                            $('#comuna_check').attr("src","../assets/ico/error.png");
                            $('#comuna_check').show();
                        }
                    });
               }else{
                   console.log("No se encuentra comuna");
                            $(".id_comuna").tooltip(
                                    {
                                    title: 'El Campo Comuna no puede estar vacio',
                                    placement: 'bottom'});
                            $(".id_comuna").attr("ok", "false");
                            $('#comuna_check').attr("src","../assets/ico/error.png");
                            $('#comuna_check').show();
               }
             });
        },
        /**
         * Método encargado de validar el input de id_predio al momento de ingresar
         * una nueva tabla
         * @returns {undefined}
         */
        cargaFuncioneskeyPress: function(){
            $(".idpredio").focusout(function(){
                var idPredio = $('.idpredio').val();
                if (idPredio != ""){
                    $.ajax({
                        url:'verificaIdPredio.php',
                        type:'POST',
                        dataType:'json',
                        data:{ idpredio:$('.idpredio').val()}
                    }).done(function(respuesta){
                        console.log(respuesta);
                        console.log("llamada post terminada");
                        
                        if(respuesta.error == "1"){
                            console.log("codigo retornado : "+respuesta.error);
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
                

              
        autocompleteModificar: function(){
            console.log("se inicia autocompletar modifica comuna");
            $(".comuna_modificar").autocomplete({
                source: "buscaComuna.php",
                minLength: 2,
//                appendTo: '#nuevoPredio',
                select: function(event, ui){
                    $(".comuna_modificar").attr("comuna",ui.item.id);
                     $(".comuna_modificar").attr("ok", "true");
                    $('#comuna_check_modificar').attr("src","../assets/ico/tick.gif");
                        $('#comuna_check_modificar').show();
                     $(".comuna").tooltip('destroy');
                },
                change: function(event, ui){
                    if(!ui.item){
                        $(".comuna_modificar").tooltip(
                                {
                                title: 'Seleccione una opción válida',
                                placement: 'bottom'});
                        /*
                         * Agrega check_error en input comuna
                         */
                        $(".comuna_modificar").attr("ok", "false");
                        $('#comuna_check_modificar').attr("src","../assets/ico/error.png");
                        $('#comuna_check_modificar').show();
                        
                    }
                }
            }).css('z-index',1000);
            console.log("Autocomplete comuna modificar cargado");
            $(".comuna_modificar").focusout(function(){
               if($('.comuna_modificar').val()!=""){ 
                    $.ajax({
                        url:'buscaComuna.php',
                        type:'POST',
                        dataType:'json',
                        data:{ nombreComuna:$('.comuna_modificar').val()}
                    }).done(function(respuesta){
                        console.log("llamada post terminada");
                        if(respuesta.error == "1"){
                            console.log(respuesta.nombre + " y " + respuesta.id +" obtenidos");
                            $(".comuna_modificar").val(respuesta.nombre);
                            $(".comuna_modificar").attr("idcomuna", respuesta.id);
                            $(".comuna_modificar").attr("ok", "true");
                            $(".comuna_modificar").tooltip('destroy');
                            $('#comuna_check_modificar').attr("src","../assets/ico/tick.gif");
                            $('#comuna_check_modificar').show();
                        }else{
                            console.log("No se encuentra comuna");
                            $(".comuna_modificar").tooltip('destroy');
                            $(".comuna_modificar").tooltip(
                                    {
                                    title: 'Seleccione una opción válida',
                                    placement: 'bottom'});
                            $(".comuna_modificar").attr("ok", "false");
                            $('#comuna_check_modificar').attr("src","../assets/ico/error.png");
                            $('#comuna_check_modificar').show();
                        }
                    });
               }else{
                   console.log("No se encuentra comuna");
                            $(".comuna_modificar").tooltip(
                                    {
                                    title: 'El Campo Comuna no puede estar vacio',
                                    placement: 'bottom'});
                            $(".comuna_modificar").attr("ok", "false");
                            $('#comuna_check_modificar').attr("src","../assets/ico/error.png");
                            $('#comuna_check_modificar').show();
               }
             });
        },
        
        cargaFuncioneskeyPressModificar: function(){
            idPredioModificar = $('.idpredio_modificar').val();
            $(".idpredio_modificar").focusout(function(){
               
                var idPredio = $('.idpredio_modificar').val();
                if(idPredio != idPredioModificar){
                    if (idPredio != ""){
                        $.ajax({
                            url:'verificaIdPredio.php',
                            type:'POST',
                            dataType:'json',
                            data:{ idpredio:$('.idpredio_modificar').val()}
                        }).done(function(respuesta){
                            console.log(respuesta);
                            console.log("llamada post terminada");

                            if(respuesta.error == "1"){
                                console.log("codigo retornado : "+respuesta.error);
                                $(".idpredio_modificar").tooltip('destroy');
                                $(".idpredio_modificar").attr("ok", "true");
                                $('#id_predio_modificar').attr("src","../assets/ico/tick.gif");
                                $('#id_predio_modificar').show();
                            }else{
                                console.log("el id ya esta en el sistema");
                                $(".idpredio_modificar").tooltip('destroy');
                                $(".idpredio_modificar").tooltip(
                                        {
                                        title: 'El id seleccionado no se encuentra disponible',
                                        placement: 'bottom'});
                                $(".idpredio_modificar").attr("ok", "false");
                                $('#id_predio_modificar').attr("src","../assets/ico/error.png");
                                $('#id_predio_modificar').show();
                            }
                        });
                    }else{
                        $('#id_predio_modificar').attr("src","../assets/ico/error.png");
                                $('#id_predio_check').show();
                                $(".idpredio_modificar").tooltip('destroy');
                        $(".idpredio_modificar").tooltip(
                                    {
                                    title: 'El Campo predio No puede estar vacio',
                                    placement: 'bottom'});
                       $(".idpredio_modificar").attr("ok", "false"); 
                    }
                }else{
                    /*
                     * No se ha modificado id predio
                     */
                    $(".idpredio_modificar").tooltip('destroy');
                    $(".idpredio_modificar").attr("ok", "true");
                    $('#id_predio_modificar').attr("src","../assets/ico/tick.gif");
                    $('#id_predio_modificar').show();
                }
            });
        },
        /**
         * Método encargado de validar el input de id_predio al momento de ingresar
         * una nueva tabla
         * @returns {undefined}
         */
        cargaFuncioneskeyPressRodal: function(){
            console.log("cargando funciones KEYPRESS para rodal");
            $("#id_rodal_nuevo").focusout(function(){
                
                var idRodal = $('#id_rodal_nuevo').val();
                console.log("id a consultar: "+idRodal);
                if (idRodal != ""){
                    $.ajax({
                        url:'verificaIdRodal.php',
                        type:'POST',
                        dataType:'json',
                        data:{ idrodal:idRodal}
                    }).done(function(respuesta){
                        console.log(respuesta);
                        console.log("llamada post terminada");
                        
                        if(respuesta.error == "1"){
                            console.log("codigo respuesta : "+respuesta.error);
                            $("#id_rodal_nuevo").tooltip('destroy');
                            $("#id_rodal_nuevo").attr("ok", "true");
                            $('#id_rodal_check').attr("src","../assets/ico/tick.gif");
                            $('#id_rodal_check').show();
                        }else{
                            console.log("el id ya esta en el sistema");
                            $("#id_rodal_nuevo").tooltip('destroy');
                            $("#id_rodal_nuevo").tooltip(
                                    {
                                    title: 'El id seleccionado no se encuentra disponible',
                                    placement: 'bottom'});
                            $("#id_rodal_nuevo").attr("ok", "false");
                            $('#id_rodal_check').attr("src","../assets/ico/error.png");
                            $('#id_rodal_check').show();
                        }
                    });
                }else{
                    $('#id_rodal_check').attr("src","../assets/ico/error.png");
                            $('#id_rodal_check').show();
                            $("#id_rodal_nuevo").tooltip('destroy');
                    $("#id_rodal_nuevo").tooltip(
                                {
                                title: 'El Campo predio No puede estar vacio',
                                placement: 'bottom'});
                   $("#id_rodal_nuevo").attr("ok", "false"); 
                }
            });
        },
        
      };
    })();
