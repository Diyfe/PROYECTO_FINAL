<?php
    final class Mapeador {
    public static function mapearAdministrador(Administrador $administrador, array $datos){
        
        if(array_key_exists('idAdministrador', $datos)){
            $administrador->setDocumento($datos['idAdministrador']);
        }
        if(array_key_exists('nombre', $datos)){
            $administrador->setNombre($datos['nombre']);
        }
        if(array_key_exists('apellidos', $datos)){
            $administrador->setApellidos($datos['apellidos']);
        }
       
        if(array_key_exists('telefono', $datos)){
            $administrador->setTelefono2($datos['telefono']);
        }
        if(array_key_exists('email', $datos)){
            $administrador->setEmail($datos['email']);
        }
        if(array_key_exists('direccion', $datos)){
            $administrador->setDireccion($datos['direccion']);
        }
    }

}

?>
