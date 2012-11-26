<?php

require_once 'dao/recursosDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EJEMPLO PERSONAS</title>
        <script type="text/javascript">
            
            function agregar(obj) {
                var frm = obj.form;
                frm.action = 'Paginas/Agregar_recursos.html';
                frm.submit();
            }

            function modificar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Paginas/Actualizar_recursos.html';
                    frm.submit();
                }
            }
            
            function eliminar(obj) {
                var frm = obj.form;
                if (!hayOpcionChequeada(frm)) {
                    alert('Debe seleccionar una opcion');
                }else{
                    frm.action = 'Paginas/Eliminar_recursos.php';
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
        $pdao = new RecursosDAO();
        $personas = $pdao->leerTodos();
        ?>
        <form name="form1" method="post" action="">
            <table width="757" border="1" cellspacing="1" cellpadding="1">
                <caption>
                    RECURSOS
                </caption>
                <tr>
                    <th width="34" align="center" scope="col">&nbsp;</th>
                    <th width="139" scope="col">Nombre</th>
                    <th width="135" scope="col">URL</th>
                    <th width="137" scope="col">Archivos Asociados</th>
                    <th width="131" scope="col">fecha</th>
                    
                </tr>
                <?php
                if (!empty($personas)) {
                    foreach ($personas as $persona) {
                        ?>
                        <tr>
                            <td align="center"><input type="radio" name="documento" id="documento<?php echo $persona['Nombre']; ?>" value="<?php echo $persona['Nombre']; ?>"></td>
                            <td><?php echo $persona['Nombre']; ?></td>
                            <td><?php echo $persona['URL']; ?></td>
                            <td><?php echo $persona['Archivos Asociados' ]; ?></td>
                           
             
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


