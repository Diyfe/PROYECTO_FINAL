<?php

//require_once "../configuracion/Configuracion.php";

include_once  dirname(__FILE__).'\..\Configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\Modelo\Estudiante.php';
include_once dirname(__FILE__).'\..\Modelo\Mapeador.php';

class estudianteDAO {

  
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
        $sql = "SELECT * FROM estudiantes";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        if(!$cursor){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        $filas = $sentencia->fetchAll();
        if(!$filas){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
    $listaestudiantes = array();
        foreach ($filas as $fila) {
            $persona = new Estudiante();
            Mapeador::mapearEstudiante($persona, $fila);
            $listaestudiantes[]=$persona;
        }         
        
        return $listaestudiantes;
    }

    public function leerPorDocumento($documento = '') {
        $sql = "SELECT * FROM estudiantes WHERE idEstudiantes = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
    
        $filas = $sentencia->fetch();
        $estudiante = new Estudiante();
        Mapeador::mapearEstudiante($estudiante, $filas);
        return $estudiante;
    }

    public function insertarEstudiante(Estudiante $estudiante) {
        $sql = "INSERT INTO `estudiantes` (`idEstudiantes`, `Nombres`, `Apellidos`, `Telefono`, `E-mail`, `Direccion`,`Fecha`) VALUES ";
        $sql.=" (:idEstudiantes, :nombres, :apellidos, :telefono, :email, :direccion, :fecha) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $estudiante);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
    }

    public function actualizarEstudiante(Estudiante $estudiante) {
        $sql = "UPDTE `estudiantes` SET `Nombres`=:nombres,`Apellidos`=:apellidos,`Telefono`=:telefono, ";
        $sql.=" `E-mail`=:email,`Direccion`=:direccion,`Fecha`=:fecha ";
        $sql.=" WHERE idEstudiantes= :idEstudiantes ";
        return $this->ejecutarInserUpdate($sql, $estudiante);
    }
    
    public function eliminarEstudiante(Estudiante $estudiante) {
        $sql = "DELETE FROM estudiantes WHERE idEstudiantes = :idEstudiantes";
        return $this->ejecutarDelete($sql, $estudiante);
    }
    

    private function ejecutarInserUpdate($sql, Estudiante $estudiante) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($estudiante);
        //return $sentencia->execute($parametros);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
    private function ejecutarDelete($sql, Estudiante $estudiante){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':idEstudiantes' => $estudiante->getIdEstudiante());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Estudiante $estudiante) {
        $parametros = array(
            ':idEstudiantes' => $estudiante->getIdEstudiante(),
            ':Nombres' => $estudiante->getNombres(),
            ':Apellidos' => $estudiante->getApellidos(),
            ':Telefono' => $estudiante->getTelefono(),
            ':Email' => $estudiante->getEmail(),
            ':Direccion' => $estudiante->getDireccion(),
            ':Fecha' => date('Y-m-d G:i:s')
        );
        return $parametros;
    }


    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
    }
}

?>

