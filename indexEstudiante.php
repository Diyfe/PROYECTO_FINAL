<?php
require_once 'dao/estudianteDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EJEMPLO PERSONAS</title>
        <script type="text/javascript">
            
            function agregar(obj) {
                var frm = obj.form;
                frm.action = 'Paginas/Agregar_estudiante.html';
                frm.submit();
            }

            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Paginas/Actualizar_estudiante.html';
                    frm.submit();
                }
            }
            
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Paginas/Eliminar_estudiante.php';
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
        $edao = new estudianteDAO();
        $estudiante = $edao->leerTodos();
        ?>
        <form name="form1" method="post" action="ctlEstudiante">
            <table width="757" border="1" cellspacing="1" cellpadding="1">
                <caption>
                    PERSONAS
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th width="139" scope="col">idDocente</th>
                    <th width="135" scope="col">Nombres</th>
                    <th width="137" scope="col">Apellidos</th>
                    <th width="131" scope="col">Telefono</th>
                    <th width="138" scope="col">email</th
                    <th width="148" scope="col">Dirección</th>
                    <th width="136" scope="col">Fecha</th>
                </tr>
                <?php
                if (!empty($estudiantes)) {
                    foreach ($estudiantes as $estudiante) {
                        ?>
                        <tr>
                            <td align="center"><input type="radio" name="documento" id="documento<?php echo $estudiante['idEstudiantes']; ?>" value="<?php echo $estudiante['idEstudiantes']; ?>"></td>
                            <td><?php echo $estudiante['idEstudiantes']; ?></td>
                            <td><?php echo $estudiante['nombres']; ?></td>
                            <td><?php echo $estudiante['apellidos']; ?></td>
                            <td><?php echo $estudiante['telefono']; ?></td>
                            <td><?php echo $estudiante['email']; ?></td>
                            <td><?php echo $estudiante['direccion']; ?></td>
                            <td><?php echo $estudiante['fecha']; ?></td>
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

