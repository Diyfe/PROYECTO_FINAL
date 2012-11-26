<?php

include dirname(__FILE__) . '\..\Modelo\Recursos.php';
include dirname(__FILE__) . '\..\Modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\recursosDAO.php';

$persona = new Recursos();

$mensaje = "";

$datos = array(
    'nombre' => $_POST['recursos']['nombre'],
    'url' => $_POST['recursos']['url'],
    'archivosAsociados' => $_POST['recursos']['archivosAsociados']
    
);

Mapeador::mapearRecursos($persona, $datos);

$personaDAO = new recursosDAO();
try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarrecursos($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarrecursos($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarrecursos($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexRecursos.php'>Regresar al inicio</a>";
?>
