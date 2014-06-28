/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type predio._L10.Anonym$0
 */


console.log('iniciando eventos de inventario');
    var inventario = (function() {
      var variablePublica = "podria iniciar un widget aqui";
       var confLoad = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'});
        var confInventario;
      return {
        /**
         * Método encargado de cargar tabla en el contenedor con el id
         * page-wrapper
         * @author Ivan
         * @param {String} tabla
         * @returns {undefined}
         */
         
        cancelarIngresoPredio: function(){
            console.log("Ingreso de predio cancelado");
            $.unblockUI();
        },
        /**
         * metodo el cual recibirá los parametros, validará y enviará
         * por ajax a php
         * @returns {Boolean}
         */
        aceptarIngresoInventario: function(id){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
                  var idRodal = id;
                  val_servicio = $(".servicio").val();
                  val_sistemaInventario = $(".sistemaInventario").val();
                  console.log("sistema inventario: "+val_sistemaInventario);
                  val_diametroMedio = $(".diametroMedio").val();
                  val_alturaDominante = $(".alturaDominante").val();
                  val_areaBasal = $(".areaBasal").val();
                  val_volumen = $(".volumen").val();
                  val_numeroArboles = $(".numeroArboles").val();
                  val_altura = $(".altura").val();
                  val_fecha = $(".fecha").val();
            
            var datos = 'idrodal='+ idRodal 
                    + '&servicio=' + val_servicio
                    + '&sistemaInventario=' + val_sistemaInventario 
                    + '&diametroMedio=' + val_diametroMedio
                    + '&alturaDominante=' + val_alturaDominante
                    + '&areaBasal=' + val_areaBasal
                    + '&volumen=' + val_volumen
                    + '&numeroArboles=' + val_numeroArboles
                    + '&altura=' + val_altura
                    + '&fecha=' + val_fecha;
                    console.log(datos);
            $.ajax({
                type: "POST",
                url: "ingresarInventario.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente aceptar ingreso inventario");
                    
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Error al Ingresar Inventario');
                                  
                }
            });
            return false;
        },
        
        /**
         * metodo encargado de mostrar formulario para ingresar
         * un nuevo predio
         * @returns {undefined}
         */
        ingresaNuevoInventario: function(id){
             $( "#nuevoInventario" ).dialog({
              title: "Nuevo Inventario para el Rodal "+id,
              height: 560,
              width: 500,
              modal: true,
              position: { my: "center top", at: "center top", of: "#page-wrapper" },
              resizable: false,
              buttons: {
                Aceptar: function() {
                  console.log("Se inicia validacion");
                  valida = true;
                  ok_servicio = false;
                  ok_sistemaInventario = false;
                  ok_diametroMedio = false;
                  ok_alturaDominante = false;
                  ok_areaBasal = false;
                  ok_volumen = false;
                  ok_numeroArboles = false;
                  ok_altura =  false;
                  ok_fecha = false;
                  
                 
                  val_idRodal = id;
                  val_servicio = $(".servicio").val();
                  val_sistemaInventario = $(".sistemaInventario").val();
                  val_diametroMedio = $(".diametroMedio").val();
                  val_alturaDominante = $(".alturaDominante").val();
                  val_areaBasal = $(".areaBasal").val();
                  val_volumen = $(".volumen").val();
                  val_numeroArboles = $(".numeroArboles").val();
                  val_altura = $(".altura").val();
                  val_fecha = $(".fecha").val();
                  
                  console.log("valor servicio "+val_servicio);
                  if(val_servicio != ""){
                      console.log("servicio es correcto")
                      $(".servicio").tooltip('destroy');
                      ok_servicio = true;
                      
                  }else{
                      $(".servicio").tooltip(
                                    {
                                    title: 'El campo servicio no puede ser vacio',
                                    placement: 'bottom'});
                                $(".servicio").addClass("error");
                  }
                  
                  if(val_sistemaInventario != ""){
                      console.log("Sistema Inventario es correcto")
                      $(".sistemaInventario").tooltip('destroy');
                      ok_sistemaInventario= true;
                  }else{
                      $(".sistemaInventario").tooltip(
                                    {
                                    title: 'El campo Sistema Inventario es texto, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_diametroMedio != ""){
                      console.log("valor comercial es correcto")
                      $(".diametroMedio").tooltip('destroy');
                      ok_diametroMedio = true;
                  }else{
                      $(".diametroMedio").tooltip(
                                    {
                                    title: 'El campo valor diámetro medio comercial es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_alturaDominante != ""){
                      console.log("valor comercial es correcto")
                      $(".alturaDominante").tooltip('destroy');
                      ok_alturaDominante = true;
                  }else{
                      $(".alturaDominante").tooltip(
                                    {
                                    title: 'El campo valor altura dominante  es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_areaBasal != ""){
                      console.log("valor comercial es correcto")
                      $(".areaBasal").tooltip('destroy');
                      ok_areaBasal = true;
                  }else{
                      $(".areaBasal").tooltip(
                                    {
                                    title: 'El campo valor altura área basal es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_volumen != ""){
                      console.log("valor volumen es correcto")
                      $(".volumen").tooltip('destroy');
                      ok_volumen = true;
                  }else{
                      $(".volumen").tooltip(
                                    {
                                    title: 'El campo valor volumen es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_numeroArboles != ""){
                      console.log("valor numero de arboles es correcto")
                      $(".numeroArboles").tooltip('destroy');
                      ok_numeroArboles = true;
                  }else{
                      $(".numeroArboles").tooltip(
                                    {
                                    title: 'El campo numero arboles es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_altura != ""){
                      console.log("valor altura es correcto")
                      $(".altura").tooltip('destroy');
                      ok_altura = true;
                  }else{
                      $(".altura").tooltip(
                                    {
                                    title: 'El campo altura es númerico, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  if(val_fecha != ""){
                      console.log("valor fecha es correcto")
                      $(".fecha").tooltip('destroy');
                      ok_fecha = true;
                  }else{
                      $(".fecha").tooltip(
                                    {
                                    title: 'El campo fecha es una date, y no puede ser vacio',
                                    placement: 'bottom'});
                  }
                  
                  
                  valida = valida && ok_servicio && ok_sistemaInventario && ok_diametroMedio && ok_alturaDominante 
                          && ok_areaBasal && ok_volumen && ok_numeroArboles && ok_altura && ok_fecha;
                  
                  if(valida){
                       inventario.aceptarIngresoInventario(id);
                       $( this ).dialog( "close" );
                  }else{
                      switch(false){
                          case ok_servicio: $(".servicio").focus();
                              break;
                          case ok_sistemaInventario: $(".sistemaInventario").focus();
                              break;
                          case ok_diametroMedio: $(".diametroMedio").focus();
                              break;
                          case ok_alturaDominante: $(".alturaDominante").focus();
                              break;
                          case ok_areaBasal: $(".areaBasal").focus();
                              break;
                          case ok_volumen: $(".volumen").focus();
                              break;
                          case ok_numeroArboles: $(".numeroArboles").focus();
                              break;
                          case ok_altura: $(".altura").focus();
                              break;
                          case ok_fecha: $(".fecha").focus();
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
            console.log('abriendo contenedor nuevo inventario');
            
            
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
         eliminarInventario: function(id, idRodal){
            var confirmacion = confirm("¿Está seguro que desea eliminar?");
            if(confirmacion){
                var idInventario = id;
                
                console.log("Id Inventario a eliminar: "+idInventario);
                var datos = 'idinventario='+ idInventario ;
                $.ajax({
                    type: "GET",
                    url: "eliminarInventario.php",
                    data: datos,
                    success: function(response) {
                        console.log("Ajax ejecutado correctamente");
                        rodal.cargarListaInventario(idRodal);
                        
                    },
                    error: function() {
                        console.log("Error al ejecutar AJAX");
                        //$('#page-wrapper').html('Consulta mal hecha');
                                      
                    }
                });
            }
            
        },
        modificarInventario: function(id, idRodal){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idInventario = id;
            var datos = 'idinventario='+ idInventario ;
            $.ajax({
                type: "POST",
                url: "modificarInventario.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#editInventarioDialog').html(response);
                    
                    inventario.mostrarModificar(id,idRodal);
                    
                   
                },
                error: function() {
                    console.log("Error al ejecutar AJAX");
                    //$('#page-wrapper').html('Consulta mal hecha');
                                  
                }
            });
            
        },
        mostrarModificar: function(id,idRodal){
              $( "#editInventarioDialog" ).dialog({
              title: "Edición Inventario "+id,
              height: 560,
              width: 500,
              modal: true,
             
              resizable: false,
              buttons: {
                Actualizar: function() {
                  
                  var bValid = true;
                  var idinventario = id;
                  idRodal = $("#idRodal").val();
                  servicio = $("#servicio").val();
                  sistemaInventario = $("#sistemaInventario").val();
                  diametroMedio = $("#diametroMedio").val();
                  alturaDominante = $("#alturaDominante").val();
                  areaBasal = $("#areaBasal").val();
                  volumen = $("#volumen").val();
                  numeroArboles = $("#numeroArboles").val();
                  altura = $("#altura").val();
                  fechaMedicion = $("#fecha").val();
                  
            
            var datos = 'idrodal='+ idRodal
                        + '&servicio=' + servicio 
                        + '&sistemaInventario=' + sistemaInventario 
                        + '&diametroMedio=' + diametroMedio 
                        + '&alturaDominante=' + alturaDominante
                        + '&areaBasal=' + areaBasal
                        + '&volumen=' + volumen
                        + '&numeroArboles=' + numeroArboles
                        + '&altura=' + altura
                        + '&fechaMedicion=' + fechaMedicion
                        + '&idInventario='+ idinventario;
                console.log(datos);
                
            $.ajax({
                
                type: "POST",
                url: "guardarCambiosActualizacionInventario.php",
                data: datos,
                success: function(response) {
                    console.log("Actualizacion correcta");
                    $('#page-wrapper').html(response);
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
                  //rodal.cargarListaInventario(idRodal);
                }
              },
              close: function() {
                $( this ).dialog( "close" );
                //rodal.cargarListaInventario(idRodal);
              }
            });
        }
        
      };
    })();
