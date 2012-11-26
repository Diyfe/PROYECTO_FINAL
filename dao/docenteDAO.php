<?php

//require_once "../configuracion/Configuracion.php";

include_once dirname(__FILE__) . '\..\Configuracion\Configuracion.php';
include_once dirname(__FILE__) . '\..\Modelo\Docente.php';
include_once dirname(__FILE__).'\..\Modelo\Mapeador.php';

class docenteDAO {

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
        $sql = "SELECT * FROM docente";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        if(!$cursor){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        $filas = $sentencia->fetchAll();
        if(!$filas){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        $listadocentes = array();
        foreach ($filas as $fila) {
            $docente = new Docente();
            Mapeador::mapearDocente($docente, $fila);
            $listadocentes[]=$docente;
        }         
        
        return $listadocentes;
    }


    public function leerPorDocumento($documento = '') {
        $sql = "SELECT * FROM docente WHERE idDocente = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Docente();
        Mapeador::mapearDocente($persona, $filas);
        return $persona;
    }

    public function insertarDocente(Docente $persona) {
        $sql = "INSERT INTO `docente` (`idDocente`, `Nombres`, `Apellidos`, `Telefono`, `E-mail`, `Direccion`,`Fecha`) VALUES ";
        $sql.=" (:idDocente, :Nombres, :Apellidos, :Telefono, :Email, :Direccion, :Fecha) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
    }

    public function actualizarDocente(Docente $persona) {
        $sql = "UPDTE `docente` SET `Nombres`=:Nombres,`Apellidos`=:Apellidos,`Telefono`=:Telefono, ";
        $sql.=" `E-mail`=:Email,`Direccion`=:Direccion,`Fecha`=:Fecha ";
        $sql.=" WHERE idDocente = :idDocente ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }
    
    public function eliminarDocente(Docente $persona) {
        $sql = "DELETE FROM docente WHERE idDocente = :idDocente";
        return $this->ejecutarDelete($sql, $persona);
    }
    

    private function ejecutarInserUpdate($sql, Docente $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        //return $sentencia->execute($parametros);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
    private function ejecutarDelete($sql, Docente $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':idDocente' => $persona->getIdDocente());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Docente $persona) {
        $parametros = array(
            ':idDocente' => $persona->getIdDocente(),
            ':Nombres' => $persona->getNombres(),
            ':Apellidos' => $persona->getApellidos(),
            ':Telefono' => $persona->getTelefono(),
            ':Email' => $persona->getEmail(),
            ':Direccion' => $persona->getDireccion(),
            ':Fecha' => date('Y-m-d G:i:s')
        );
        return $parametros;
    }


    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
    }
}


?>
