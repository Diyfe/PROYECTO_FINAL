
<?php

include dirname(__FILE__) . '\..\Modelo\Administrador.php';
include dirname(__FILE__) . '\..\Modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\administradorDAO.php';

$persona = new Administrador();

$mensaje = "";

$datos = array(
    'idAdministrador'=>$_POST['Administrador']['idAdministrador'],
    'nombre'=>$_POST['Administrador']['nombre'],
    'apellidos'=>$_POST['Administrador']['apellidos'],
    'fecha'=>$_POST['Administrador']['fecha'],
    
);

Mapeador::mapearAdministrador($persona, $datos);

$personaDAO = new AdministradorDAO();
try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarAdministrador($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarAdministrador($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarAdministrador($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../Index.php'>Regresar al inicio</a>";
?>