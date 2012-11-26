<?php

final class Mapeador {

    public static function mapearAdministrador(Administrador $persona, array $datos) {

        if (array_key_exists('idAdministrador', $datos)) {
            $persona->setIdAministrador($datos['idAdministrador']);
        }
        if (array_key_exists('nombre', $datos)) {
            $persona->setNombre($datos['nombre']);
        }
        if (array_key_exists('apellidos', $datos)) {
            $persona->setApellidos($datos['apellidos']);
        }

        if (array_key_exists('fecha', $datos)) {
            $persona->setFecha($datos['fecha']);
        }
    }


public static function mapearAsignatura(Asignatura $asignatura, array $datos){

if(array_key_exists('idAsignatura', $datos)){
$asignatura->setIdAsignatura($datos['idAsignatura']);
}
if(array_key_exists('idDocente', $datos)){
$asignatura->setIdDocente($datos['idDocente']);
}
if (array_key_exists('nombre', $datos)) {
$asignatura->setNombre($datos['nombre']);
}
if (array_key_exists('contenido', $datos)) {
$asignatura->setContenido ($datos['contenido']);
}
if (array_key_exists('metodologia', $datos)) {
$asignatura->setMetodologia($datos['metodologia']);
}
if (array_key_exists('bibliografia', $datos)) {
$asignatura->setBibliografia($datos['bibliografia']);
}
if (array_key_exists('fecha', $datos)) {
$asignatura->setFecha($datos['fecha']);
}
}

public static function mapearPersona(Persona $persona, array $datos){
        
        if(array_key_exists('idPersona', $datos)){
            $persona->setIdPersona($datos['idPersona']);
        }
        if(array_key_exists('Nombre', $datos)){
            $persona->setNombre($datos['Nombre']);
        }
        if(array_key_exists('Apellidos', $datos)){
            $persona->setApellidos($datos['Apellidos']);
        }
        if(array_key_exists('Telefono', $datos)){
            $persona->setTelefono($datos['Telefono']);
        }
        if(array_key_exists('E-mail', $datos)){
            $persona->setEmail($datos['E-mail']);
        }
        if(array_key_exists('fecha', $datos)){
            $persona->setFecha($datos['fecha']);
        }
        if(array_key_exists('usuario', $datos)){
            $persona->setUsuario($datos['usuario']);
        }
        if(array_key_exists('contrasena', $datos)){
            $persona->setContrasena($datos['contrasena']);
        }
}
public static function mapearDocente(Docente $docente, array $datos){
        
        if(array_key_exists('idDocente', $datos)){
            $docente->setIdDocente($datos['idDocente']);
        }
        if(array_key_exists('Nombres', $datos)){
            $docente->setNombres($datos['Nombres']);
        }
        if(array_key_exists('Apellidos', $datos)){
            $docente->setApellidos($datos['Apellidos']);
        }
          if(array_key_exists('Email', $datos)){
            $docente->setEmail($datos['Email']);
        }
        if(array_key_exists('Telefono', $datos)){
            $docente->setTelefono($datos['Telefono']);
        }
        if(array_key_exists('Direccion', $datos)){
            $docente->setDireccion($datos['Direccion']);
        }
      
        if(array_key_exists('Fecha', $datos)){
            $docente->setFecha($datos['Fecha']);
        }
}

public static function mapearEstudiante ($estudiante, array $datos){
        
        if(array_key_exists('idEstudiantes', $datos)){
            $estudiante->setIdEstudiante($datos['idEstudiantes']);
        }
        if(array_key_exists('Nombres', $datos)){
            $estudiante->setNombres($datos['Nombres']);
        }
        if(array_key_exists('Apellidos', $datos)){
            $estudiante->setApellidos($datos['Apellidos']);
        }
          if(array_key_exists('Email', $datos)){
            $estudiante->setEmail($datos['Email']);
        }
        if(array_key_exists('Telefono', $datos)){
            $estudiante->setTelefono($datos['Telefono']);
        }
        if(array_key_exists('Direccion', $datos)){
            $estudiante->setDireccion($datos['Direccion']);
        }
      
        if(array_key_exists('Fecha', $datos)){
            $estudiante->setFecha($datos['Fecha']);
        }
}

    public static function mapearRecursos(Recursos $persona, array $datos){
        
        if(array_key_exists('Nombre', $datos)){
            $persona->setNombre($datos['Nombre']);
        }
        if(array_key_exists('URL', $datos)){
            $persona->setUrl($datos['URL']);
        }
        if(array_key_exists('ArchivosAsosciados', $datos)){
            $persona->setArchivosAsociados($datos['ArchivosAsociados']);
        }
       
    


    }
    
    }



?>
