
console.log('iniciando eventos de caminos');
var consultor_camino = (function() {
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
            color: '#fff'},
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
    
    return {
        /**
         * Método que cargar tabla en el contenedor con el id "page-wrapper"
         * @author Javier
         * @param {String} tabla
         * @returns {undefined}
         */
        cargarTabla: function() {
            $(document).ajaxStart($.blockUI(confLoad)).ajaxStop($.unblockUI);
            var randomnumber = Math.random() * 11;
            $('#page-wrapper').load('Consultor_Camino.php', function() {
                $("#tabla_contactos").dataTable(
                        {
                            "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
                            "sPaginationType": "bootstrap",
                            "oLanguage": {
                                "sLengthMenu": "_MENU_ records per page"
                            }
                        }

                );
            });
            console.log('tabla cargada');
        },
        vaciaTabla: function(tabla) {
            console.log('tabla ocultada');
        }
    };
})();
