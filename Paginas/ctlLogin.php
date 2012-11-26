<?php
include dirname(__FILE__) . '\..\Modelo\Usuario.php';
include dirname(__FILE__) . '\..\Modelo\Mapeador.php';
include dirname(__FILE__) . '\..\dao\UsuarioDAO.php';
$mensaje = "";
session_start();
if (array_key_exists("usuario", $_POST)) {
    $usuarioP = $_POST['usuario'];
    $usuario = new Usuario();
    $usuario->setUsuario($usuarioP);
    $userDAO = new UsuarioDAO();
    $usuario = $userDAO->leerPorUsuario($usuarioP);
    if($usuario == null){
        $mensaje="Usuario/Clave no encontrados";
    }else{
        $_SESSION['usuario'] = $usuario->getUsuario();
        $_SESSION['nombre'] = $usuario->getNombre();
        header('Location: home.php');
        die();
    }
}
?>

