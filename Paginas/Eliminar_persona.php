<?php
    include dirname(__FILE__). '\..\Modelo\Persona.php';
    include dirname(__FILE__). '\..\Modelo\Mapeador.php';
    include dirname(__FILE__). '\..\dao\personaDAO.php';
    
    $documento = "";
    if(array_key_exists('documento', $_POST)){
        $documento = $_POST['documento'];
    }
    
    $personaDAO = new personaDAO();
    $persona = new Persona();
    $persona = $personaDAO->leerPorDocumento($documento);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar Persona</title>
</head>
<body>
    <form id="form1" name="form1" method="post" action="ctlPersonas.php">
        
        <input name="eliminar" type="hidden" value="1"/>
        
  <p>&nbsp;</p>
  <table width="383" border="1" cellspacing="1" cellpadding="1">
	<caption>ELIMINAR PERSONA</caption>
    <tr>
      <td width="76">idPersona</td>
      <td width="294"><input name="Persona[idPersona]" type="text" readonly="yes" id="idPersona" value="<?php echo $persona->getidPersona();?>" /></td>
    </tr>
    <tr>
      <td>Nombres</td>
      <td><input name="Persona[Nombre]" type="text" id="Nombre" readonly="yes" size="45" value="<?php echo $persona->getNombre();?>" /></td>
    </tr>
    <tr>
      <td>Apellidos</td>
      <td><input name="Persona[Apellidos]" type="text" id="apellidos" readonly="yes" size="45" value="<?php echo $persona->getApellidos();?>" /></td>
    </tr>
    <tr>
      <td>Telefono 1</td>
      <td><input name="Persona[Telefono]" type="text" id="telefono" readonly="yes" value="<?php echo $persona->getTelefono();?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="Persona[E-mail]" type="text" id="E-mail" size="45" readonly="yes" value="<?php echo $persona->getEmail();?>" /></td>
    </tr>
    <tr>
    <td>Fecha</td>
      <td><input name="Persona[fecha]" type="text" id="fecha" size="45" readonly="yes" value="<?php echo $persona->getFecha();?>" /></td>
    </tr>
    <tr>
         <tr>
    <td>Usuario</td>
    <td><input name="Persona[usuario]" type="text" id="fecha" size="45" readonly="yes" value="<?php echo $persona->getUsuario();?>" /></td>
    </tr>
         <tr>
    <td>Contraseña</td>
    <td><input name="Persona[contrasena]" type="text" id="fecha" size="45" readonly="yes" value="<?php echo $persona->getContrasena();?>" /></td>
    </tr>
    <tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Eliminar" /></td>
    </tr>
</table>
</form>
</body>
</html>

