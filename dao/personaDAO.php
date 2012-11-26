<?php

//require_once "../configuracion/Configuracion.php";

include_once  dirname(__FILE__).'\..\Configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\Modelo\Persona.php';
include_once dirname(__FILE__).'\..\Modelo\Mapeador.php';

class PersonaDAO {

  
    private $db;

    const SQL_INSERTAR = 1;

    private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        try {
            $cfg = Configuracion::obtConfig("basedatos");
            $this->db = new PDO($cfg['dsn'], $cfg['user'], $cfg['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $exc) {
            throw new Exception("La base de datos no pudo ser creada.".$exc->getMessage());
        }
        return $this->db;
    }

    public function leerTodos() {
        $sql = "SELECT * FROM persona";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        if(!$cursor){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        $filas = $sentencia->fetchAll();
        if(!$filas){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        $listapersonas = array();
        foreach ($filas as $fila) {
            $persona = new Persona();
            Mapeador::mapearPersona($persona, $fila);
            $listapersonas[]=$persona;
        }         
        
        return $listapersonas;
    }

    public function leerPorDocumento($documento = '') {
        $sql = "SELECT * FROM persona WHERE idPersona = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
    
        $filas = $sentencia->fetch();
        $persona = new Persona();
        Mapeador::mapearPersona($persona, $filas);
        return $persona;
        
    }

    public function insertarPersona(Persona $persona) {
        $sql = "INSERT INTO `persona` (`idPersona`, `Nombre`, `Apellidos`, `Telefono`,  `E-mail`, `fecha`,`usuario`,`contrasena`) VALUES ";
        $sql.=" (:idPersona, :Nombre, :Apellidos, :Telefono, :Email, :fecha,:usuario,:contrasena) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
    }

    public function actualizarPersona(Persona $persona) {
        $sql = "UPDTE `persona` SET `Nombre`=:Nombre,`Apellidos`=:Apellidos,`Telefono`=:Telefono, ";
        $sql.=" `E-mail`=:Email,`fecha`=:fecha,`usuario`=:usuario`,`contrasena`=:contrasena ";
        $sql.=" WHERE idPersona = :idPersona ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }
    
    public function eliminarPersona(Persona $persona) {
        $sql = "DELETE FROM persona WHERE idPersona = :idPersona";
        return $this->ejecutarDelete($sql, $persona);
    }
    
     public function leerPorUsuario($usuario) {
        $sql = "SELECT * FROM persona WHERE usuario= '$usuario'";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $usuario = new Usuario();
        if ($filas) {
            Mapeador::mapearPersona($usuario, $filas);
            return $usuario;
        }else{
            return null;
        }
        
    }


    private function ejecutarInserUpdate($sql, Persona $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        //return $sentencia->execute($parametros);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
    private function ejecutarDelete($sql, Persona $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':idPersona' => $persona->getIdPersona());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Persona $persona) {
        $parametros = array(
            ':idPersona' => $persona->getIdPersona(),
            ':Nombre' => $persona->getNombre(),
            ':Apellidos' => $persona->getApellidos(),
            ':Telefono' => $persona->getTelefono(),
            ':Email' => $persona->getEmail(),
            ':fecha' => date('Y-m-d G:i:s'),
            ':usuario' => $persona->getUsuario(),
            ':contrasena' => $persona->getContrasena(),
        );
        return $parametros;
    }


    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
    }
}


?>
