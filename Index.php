<?php

include 'dao/administradorDAO.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Reporte de Administradores</title>
        <script type="text/javascript">
           function agregar(obj){
                var frm = obj.form;
                frm.action = 'Paginas/Agregar_administrador.html';
                frm.submit();
            }
        </script>
    </head>
    <body>
        <?php
            $adao = new AdministradorDAO();
            $administrador = $adao->leerTodos();
        ?>
    <form name="form1" method="post" action="">
    <table width="757" border="1" cellspacing="1" cellpadding="1">
      <caption>
        ADMINISTRADOR
      </caption>
      <tr>
        <th width="34" align="center" scope="col">&nbsp;</th>
        <th width="139" scope="col">idAdministrador</th>
        <th width="135" scope="col">Nombre</th>
        <th width="137" scope="col">Apellido</th>
        <th width="131" scope="col">fecha</th>
       
      </tr>
      <?php if(!empty($administrador)) {
        foreach ($administrador as $administradores) {
      ?>
      <tr>
        <td align="center"><input type="radio" name="radio" id="radio" value="<?php echo $administradores['idAdministrador']; ?>"></td>
        <td><?php echo $administradores['idAdministrador'];?></td>
        <td><?php echo $administradores['nombre'];?></td>
        <td><?php echo $administradores['apellidos'];?></td>
        <td><?php echo $administradores['fecha'];?></td>
      </tr>
      <?php } }else{ ?>
      <tr>
        <td colspan="5" align="center">No existen personas en este momento.</td>
      </tr>
      <?php } ?>
    </table>
    <p>
      <input type="button" name="button" id="button" value="Agregar" onclick="agregar(this)">
      <input type="button" name="button2" id="button2" value="Modificar"onclick="modificar(this)">
      <input type="button" name="button3" id="button3" value="Eliminar"onclick="eliminar(this)">
    </p>
    </form>
    </body>
</html>

