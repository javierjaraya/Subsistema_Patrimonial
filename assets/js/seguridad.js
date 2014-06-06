console.log('iniciando eventos de iniciar session');
    var seguridad = (function() {
       var confLoad = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: '<img src="assets/ico/ajax.gif" class="" />Cargando...'});
      return {
        cerrarSession: function() {
          $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
          load('vista/Seguridad.php?id=cerrar');
          console.log('Session cerrada');
        }
      };
    })();
