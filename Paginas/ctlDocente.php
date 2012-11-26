<?php
include dirname(__FILE__) . '\..\Modelo\Persona.php';
include dirname(__FILE__) . '\..\Modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\docenteDAO.php';

$docente = new Docente();

$mensaje = "";

$datos = array(
    'idDocente' => $_POST['Docente']['idDocente'],
    'Nombres' => $_POST['Docente']['Nombres'],
    'Apellidos' => $_POST['Docente']['Apellidos'],
    'Telefono' => $_POST['Docente']['Telefono'],
    'Email' => $_POST['Docente']['Email'],
    'Direccion' => $_POST['Docente']['Direccion'],
    'Fecha' => $_POST['Docente']['Fecha']
);

Mapeador::mapearDocente($docente, $datos);

$docenteDAO = new docenteDAO();
try {
    if (array_key_exists("agregar", $_POST)) {
        $retorno = $docenteDAO->insertarDocente($docente);
    } elseif (array_key_exists("modificar", $_POST)) {
        $retorno = $docenteDAO->actualizarDocente($docente);
    } elseif (array_key_exists("eliminar", $_POST)) {
        $retorno = $docenteDAO->eliminarDocente($docente);
    }
} catch (Exception $ex) {
    $mensaje = "HA OCURRIDO UN ERROR!!!: " . $ex->getMessage();
}

echo $mensaje . "<p/><a href='../indexDocente.php'>Regresar al inicio</a>";

?>
