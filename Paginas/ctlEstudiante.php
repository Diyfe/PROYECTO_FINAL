<?php

include dirname(__FILE__) . '\..\Modelo\Estudiante.php';
include dirname(__FILE__) . '\..\Modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\estudianteDAO.php';

$estudiante = new Estudiante();

$mensaje = "";

$datos = array(
    'idEstudiantes' => $_POST['Estudiante']['idEstudiantes'],
    'nombres' => $_POST['Estudiante']['nombres'],
    'apellidos' => $_POST['Estudiante']['apellidos'],
    'telefono' => $_POST['Estudiante']['telefono'],
    'email' => $_POST['Estudiante']['email'],
    'direccion' => $_POST['Estudiante']['direccion'],
    'fecha' => $_POST['Estudiante']['fecha']
);

Mapeador::mapearEstudiante($estudiante, $datos);

$estudianteDAO = new estudianteDAO();
try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $estudianteDAO->insertarEstudiante($estudiante);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $estudianteDAO->actualizarEstudiante($estudiante);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $estudianteDAO->eliminarEstudiante($estudiante);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexEstudiante.php'>Regresar al inicio</a>";
?>
