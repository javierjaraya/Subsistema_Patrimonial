
<HTML>
    <HEAD>
        <TITLE>FORMULARIO</TITLE>
        <script type="text/javascript">
            function funcion1() {
                var value1 = document.nombreFormulario.casilla1.value;
                var value2 = document.nombreFormulario.casilla2.value;
                //document.nombreFormulario.casilla2.value = document.nombreFormulario.casilla1.value;
                alert("Mensaje de alerta"+value2);
            }
        </script>
    </HEAD>

    <BODY>
        <H1>Formularios</H1>
        <FORM NAME="nombreFormulario">
            <INPUT TYPE="text" NAME="casilla1" VALUE="" SIZE=4><BR>
            <INPUT TYPE="text" NAME="casilla2" VALUE="" SIZE=4 onkeyup="funcion1()">
            
        </FORM>
    </body>
</HTML>