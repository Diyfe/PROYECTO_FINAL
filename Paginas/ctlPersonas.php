<?php

include dirname(__FILE__) . '\..\Modelo\Persona.php';
include dirname(__FILE__) . '\..\Modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\personaDAO.php';


$persona = new Persona();

$mensaje = "";

$datos = array(
    'idPersona' => $_POST['Persona']['idPersona'],
    'Nombre' => $_POST['Persona']['Nombre'],
    'Apellidos' => $_POST['Persona']['Apellidos'],
    'Telefono' => $_POST['Persona']['Telefono'],
    'E-mail' => $_POST['Persona']['E-mail'],
    'fecha' => $_POST['Persona']['fecha'],
    'usuario' => $_POST['Persona']['usuario'],
    'contrasena' => $_POST['Persona']['contrasena']
);

Mapeador::mapearPersona($persona, $datos);

$personaDAO = new personaDAO();
try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarPersona($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarPersona($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarPersona($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexPersona.php'>Regresar al inicio</a>";
?>
