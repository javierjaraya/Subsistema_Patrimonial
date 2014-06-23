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
        aceptarIngresoPredio: function(id){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idRodal = id
            idPredio = $(".idpredio").val();
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
         * metodo encargado de mostrar formulario para ingresar
         * un nuevo predio
         * @returns {undefined}
         */
        ingresaNuevoPredio: function(id){
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
