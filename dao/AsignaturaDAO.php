<?php

include_once  dirname(__FILE__).'\..\Configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\Modelo\Asignatura.php';

class AsignaturaDAO {

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
        $sql = "SELECT * FROM asignatura";
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
        $sql = "SELECT * FROM asignatura WHERE idAsignatura = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Asignatura();
        Mapeador::mapearAsignatura($persona, $filas);
        return $persona;
    }

    public function insertarAsignatura(Asignatura $persona) {
        $sql = "INSERT INTO `asignatura` (`idAsignatura`,`Docente_idDocente`, `Nombre`, `Contenido`, `Metodologia`, `Bibliografia`,`fecha`) VALUES ";
        $sql.=" (:idAsignatura,:Docente_idDocente, :Nombre, :Contenido, :Metodologia :Bibliografia, :fecha) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
    }

    public function actualizarAsignatura(Asignatura $persona) {
        $sql = "UPDTE `asignatura` SET `Nombre`=:Nombre,`Docente_idDocente`=:Docente_idDocente,`Contenido`=:Contenido,`Metodologia`=:Metodologia, ";
        $sql.=" `Bibliografia`=:Bibliografia,`fecha`=:fecha ";
        $sql.=" WHERE idAsignatura = :idAsignatura ";
        return $this->ejecutarInserUpdate($sql, $persona);
    }
    
    public function eliminarAsignatura(Asignatura $persona) {
        $sql = "DELETE FROM asignatura WHERE idAsignatura = :idAsignatura";
        return $this->ejecutarDelete($sql, $persona);
    }
    

    private function ejecutarInserUpdate($sql, Asignatura $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        //return $sentencia->execute($parametros);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
    private function ejecutarDelete($sql, Asignatura $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':idAsignatura' => $persona->getIdAsignatura());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Asignatura $persona) {
        $parametros = array(
            ':idAsignatura' => $persona->getIdAsignatura(),
            ':Docente_idDocente' => $persona->getIdDocente(),
            ':Nombre' => $persona->getNombre(),
            ':Contenido' => $persona->getContenido(),
            ':Metodologia' => $persona->getMetodologia(),
            ':Bibliografia' => $persona->getBibliografia(),
            ':fecha' => date('Y-m-d G:i:s')
        );
        return $parametros;
    }


    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
    }
}

?>

  