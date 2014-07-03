
console.log('iniciando eventos de fauna');
var fauna = (function() {
    var confLoad = ({css: {border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'},
        message: '<img src="../assets/ico/ajax.gif" class="" />Cargando...'}
    );
    var confFauna;
    return {
        cargarTabla: function() {
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var randomnumber = Math.random() * 11;
            $('#page-wrapper').load('Fauna.php', function() {
                $("#tabla_contactos").dataTable(
                        {
                            "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
                            "sPaginationType": "bootstrap",
                            "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                            }
                        }

                );
                fauna.autocompletePredioFiltro();
            });
            console.log('tabla cargada');
        },
        
        filtrarTabla: function(datos) {
            //var value1 = document.formulario.idpredio.value;
            //alert("El contenido del formulario es : " + value1);
            alest("El contenido del formulario es ajvier javeri : "+datos.idpredio);
        },
        
        autocompletePredioFiltro: function(){
            $("#idprediofiltro").autocomplete({
                source: "buscaPredio.php",
                minLength: 2,
//                appendTo: '#nuevoPredio',
                select: function(event, ui){
                    
                },
                change: function(event, ui){

                        
                   
                }
            });
        },
        cancelarIngresoCamino: function() {
            console.log("Ingreso de camino cancelado");
            $.unblockUI();
        },
        aceptarIngresoCamino: function() {
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idCamino = $(".idcamino").val();
                        longitud = $(".longitud").val();
                        tipoSuperficie = $(".superficie").val();
                        idPredio = $(".idpredio").val();


            var datos = 'idcamino=' + idCamino + '&longitud=' + longitud + '&tipoSuperficie=' + tipoSuperficie + '&idPredio=' + idPredio;
            $.ajax({
                    type: "POST",
                    url: "ingresarCamino.php",
                    data: datos,
                    success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    camino.cargarTabla();
                   
                    },
                    error: function() {
                    console.log("Error al ejecutar AJAX");
                    $('#page-wrapper').html('Error al Ingresar Camino');
                                  
                    }
            });
            return false;
        },
        modificarFauna: function(id){
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var idFauna = id;
            var datos = 'idfauna='+ idFauna ;
            console.log(idFauna);
            $.ajax({
                type: "POST",
                url: "modificarFauna.php",
                data: datos,
                success: function(response) {
                    console.log("Ajax ejecutado correctamente");
                    $('#editFaunaDialog').html(response);
                    
                    rodal.mostrarModificar();
                    
                   
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
        }
    };
})();
