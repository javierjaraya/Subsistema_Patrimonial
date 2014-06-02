/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * 
 * Propuesta uso de javascript en subsistema_patrimonio
 * @type eventos._L10.Anonym$0
 */


console.log('iniciando eventos');
    var eventos = (function() {
      var variablePublica = "podria iniciar un widget aqui";
       var configuracion = ({css: {border: 'none', 
		        padding: '15px', 
		        backgroundColor: '#000', 
		        '-webkit-border-radius': '10px', 
		        '-moz-border-radius': '10px', 
		        opacity: .5, 
		        color: '#fff' },
                        message: 'Cargando...'});
      return {
        /**
         * 
         */
        cargarTabla: function(tabla) {
          $(document).ajaxStart($.blockUI(configuracion)).ajaxStop($.unblockUI);
          $('#page-wrapper').load('vista/'+tabla+'.php');
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
      };
    })();
