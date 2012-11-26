<?php

include dirname(__FILE__) . '\..\Modelo\Asignatura.php';
include dirname(__FILE__) . '\..\Modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\AsignaturaDAO.php';

$persona = new Asignatura();

$mensaje = "";

$datos = array(
    'idAsignatura' => $_POST['Asignatura']['idAsignatura'],
    'nombre' => $_POST['Asignatura']['Nombre'],
    'contenido' => $_POST['Asignatura']['Contenido'],
    'metodologia' => $_POST['Asignatura']['Metodologia'],
    'bibliografia' => $_POST['Asignatura']['Bibliografia'],
    'fecha' => $_POST['Asignatura']['Fecha'],
    
    );

Mapeador::mapearAsignatura($persona, $datos);

$personaDAO = new AsignaturaDAO();
try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $personaDAO->insertarAsignatura($persona);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $personaDAO->actualizarAsignatura($persona);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $personaDAO->eliminarAsignatura($persona);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexAsignatura.php'>Regresar al inicio</a>";

?>
