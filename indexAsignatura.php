<?php

require_once 'dao/AsignaturaDAO.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Reporte de Asignaturas</title>
        <script type="text/javascript">
            
           function agregar(obj){
                var frm = obj.form;
                frm.action = 'Paginas/Agregar_asignatura.html';
                frm.submit();
            }
        </script>
    </head>
    <body>
        <?php
            $pdao = new AsignaturaDAO();
            $personas = $pdao->leerTodos();
        ?>
    <form name="form1" method="post" action="">
    <table width="757" border="1" cellspacing="1" cellpadding="1">
      <caption>
        ASIGNATURAS
      </caption>
      <tr>
        <th width="34" align="center" scope="col">&nbsp;</th>
        <th width="139" scope="col">idAsignatura</th>
        <th width="135" scope="col">Nombre</th>
        <th width="137" scope="col">Contenido</th>
        <th width="138" scope="col">Metodologia</th>
        <th width="140" scope="col">Bibliografia</th>
        <th width="131" scope="col">fecha</th>
       
      </tr>
      <?php if(!empty($personas)) {
        foreach ($personas as $persona) {
      ?>
      <tr>
        <td align="center"><input type="radio" name="radio" id="radio" value="<?php echo $persona['idAsignatura']; ?>"></td>
        <td><?php echo $persona['idAsignatura'];?></td>
        <td><?php echo $persona['Nombre'];?></td>
        <td><?php echo $persona['Contenido'];?></td>
        <td><?php echo $persona['Metodologia'];?></td>
        <td><?php echo $persona['Bibliografia'];?></td>
        <td><?php echo $persona['fecha'];?></td
      </tr>
      <?php } }else{ ?>
      <tr>
        <td colspan="7" align="center">No existen Asignaturas en este momento.</td>
      </tr>
      <?php } ?>
    </table>
    <p>
      <input type="button" name="button" id="button" value="Agregar" onclick="agregar(this)">
      <input type="button" name="button2" id="button2" value="Modificar" onclick= "modificar(this)">
      <input type="button" name="button3" id="button3" value="Eliminar" onclick="eliminar(this)">
    </p>
    </form>
    </body>
</html>

