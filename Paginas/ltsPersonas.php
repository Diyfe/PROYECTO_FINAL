<?php
require_once '../dao/PersonaDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EJEMPLO PERSONAS</title>
        <script type="text/javascript">
            
            function agregar(obj) {
                var frm = obj.form;
                frm.action = 'Agregar_personas.html';
                frm.submit();
            }

            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Actualizar_persona.php';
                    frm.submit();
                }
            }
            
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Eliminar_persona.php';
                    frm.submit();
                }
            }
    

            function hayOpcionChequeada(frm) {
                arrObjs = frm.elements;
                for(i=0; i < arrObjs.length; i++){
                    if(arrObjs[i].type === 'radio' && arrObjs[i].checked === true){
                        return true;
                    }
                }
                return false;
            }
        </script>
    </head>
    <body>
        <?php
        $pdao = new PersonaDAO();
        $personas = $pdao->leerTodos();
        ?>
        <form name="form1" method="post" action="">
            <table width="757" border="1" cellspacing="1" cellpadding="1">
                <caption>
                    PERSONAS
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th width="139" scope="col">Documento</th>
                    <th width="135" scope="col">Nombres</th>
                    <th width="137" scope="col">Apellidos</th>
                    <th width="131" scope="col">Telefono</th>
                    <th width="148" scope="col">Dirección</th>
                </tr>
                <?php
                if (!empty($personas)) {
                    foreach ($personas as $persona) {
                        ?>
                        <tr>
                            <td align="center"><input type="radio" name="idPersona" id="documento<?php echo $persona['idPersona']; ?>" value="<?php echo $persona['idPersona']; ?>"></td>
                            <td><?php echo $persona['idPersona']; ?></td>
                            <td><?php echo $persona['Nombre']; ?></td>
                            <td><?php echo $persona['Apellidos']; ?></td>
                            <td><?php echo $persona['Telefono']; ?></td>
                            <td><?php echo $persona['Email']; ?></td>
                             <td><?php echo $persona['contrasena']; ?></td>
                            <td><?php echo $persona['usuario']; ?></td>
                        </tr>
                    <?php }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" align="center">No existen personas en este momento.</td>
                    </tr>
<?php } ?>
            </table>
            <p>
                <input type="button" name="button" id="button" value="Agregar" onclick="agregar(this)">
                <input type="button" name="button2" id="button2" value="Modificar" onclick="modificar(this)">
                <input type="button" name="button3" id="button3" value="Eliminar" onclick="eliminar(this)">
            </p>
        </form>
    </body>
</html>

