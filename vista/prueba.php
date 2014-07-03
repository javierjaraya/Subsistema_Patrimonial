
<HTML>
    <HEAD>
        <TITLE>FORMULARIO</TITLE>
        <script type="text/javascript">
            function addIt() {
                var value1 = document.adder.inputA.value
                var value2 = document.adder.inputB.value
                document.adder.inputB.value = document.adder.inputA.value
            }
        </script>
    </HEAD>

    <BODY>
        <H1>Formularios</H1>
        <FORM NAME="adder">
            <INPUT TYPE="text" NAME="inputA" VALUE="0" SIZE=4><BR>
            <INPUT TYPE="text" NAME="inputB" VALUE="0" SIZE=4 onfocus="addIt()">
        </FORM>
    </body>
</HTML>