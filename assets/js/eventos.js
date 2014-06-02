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

      return {
        /**
         * 
         */
        cargarTabla: function(tabla) {
          $('section').load('vista/'+tabla+'.php');
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
