<?php

//require_once "../configuracion/Configuracion.php";

include_once  dirname(__FILE__).'\..\Configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\Modelo\Recursos.php';

class RecursosDAO {
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
        $sql = "SELECT * FROM recursos";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        if(!$cursor){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        $filas = $sentencia->fetchAll();
        if(!$filas){
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $filas;
    }

    public function leerPorDocumento($documento = '') {
        $sql = "SELECT * FROM recursos WHERE Nombre = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Recursos();
        Mapeador::mapearRecursos($persona, $filas);
        return $persona;
    }

    public function insertarrecursos(Recursos $persona) {
        $sql = "INSERT INTO `recursos` (`Nombre`, `URL`, `Archivos Asociados`,`fecha`) VALUES ";
        $sql.=" ( :Nombre, :URL, :Archivos Asociados, :fecha) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
    }

    public function actualizarrecursos(Recursos $persona) {
        $sql = "UPDTE `recursos` SET `URL`=:URL,`Archivos Asociaados`=Archivos Asociados,`fecha`=:fecha ";
        $sql.=" WHERE Nombre = :Nombre";
        return $this->ejecutarInserUpdate($sql, $persona);
    }
    
    public function eliminarrecursos(Recursos $persona) {
        $sql = "DELETE FROM recursos WHERE Nombre = :Nombre";
        return $this->ejecutarDelete($sql, $persona);
    }
    

    private function ejecutarInserUpdate($sql, Recursos $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        //return $sentencia->execute($parametros);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
    private function ejecutarDelete($sql, Recursos $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':Nombre' => $persona->getNombre());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Recursos $persona) {
        $parametros = array(
            ':nombre' => $persona->getNombre(),
            ':url' => $persona->getUrl(),
            ':archivosAsociados' => $persona->getArchivosAsociados(),
            ':fechaRegistro' => date('Y-m-d G:i:s')
        );
        return $parametros;
    }


    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
    }
}


?>
