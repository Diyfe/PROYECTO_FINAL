<?php
require_once 'dao/docenteDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>DOCENTE</title>
        <script type="text/javascript">
            
            function agregar(obj) {
                var frm = obj.form;
                frm.action = 'Paginas/Agregar_docente.html';
                frm.submit();
            }

            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Paginas/Actualizar_docente.html';
                    frm.submit();
                }
            }
            
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Paginas/Eliminar_docente.html';
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
        $ddao = new docenteDAO();
        $docente = $ddao->leerTodos();
        ?>
        <form name="form1" method="post" action="">
            <table width="757" border="1" cellspacing="1" cellpadding="1">
                <caption>
                   DOCENTES
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th width="139" scope="col">idDocente</th>
                    <th width="135" scope="col">Nombres</th>
                    <th width="137" scope="col">Apellidos</th>
                    <th width="131" scope="col">Telefono</th>
                    <th width="140" scope="col">email</th>
                    <th width="148" scope="col">Dirección</th>
                </tr>
                <?php
                if (!empty($docentes)) {
                    foreach ($docentes as $docente) {
                        ?>
                        <tr>
                            <td align="center"><input type="radio" name="documento" id="documento<?php echo $docente['idDocente']; ?>" 
                            <td><?php echo $docente['idDocente']; ?></td>
                            <td><?php echo $docente['nombres']; ?></td>
                            <td><?php echo $docente['apellidos']; ?></td>
                            <td><?php echo $docente['telefono']; ?></td>
                            <td><?php echo $docente['email']; ?></td>
                            <td><?php echo $docente['direccion']; ?></td>
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

