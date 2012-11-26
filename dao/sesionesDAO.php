<?php
//require_once "../configuracion/Configuracion.php";

include_once  dirname(__FILE__).'\..\Configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\Modelo\Sesiones.php';

class sesionesDAO {

    
    private $db;

    const SQL_INSERTAR = 1;

    private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        try {
            $cfg = Configuracion::obtConfig("basedatos");
            $this->db = new PDO($cfg['dsn'], $cfg['user'], $cfg['password']);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->db;
    }

    public function leerTodos() {
        $sql = "SELECT * FROM sesiones";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        $filas = $sentencia->fetchAll();
        return $filas;
    }

    public function leerPorDocumento($documento = '') {
        $sql = "SELECT * FROM sesiones WHERE idSesiones = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $cursor = $sentencia->execute();
        $filas = $sentencia->fetch();
        return $filas;
    }

    public function insertarsesiones(Sesiones $sesiones) {
        $sql = "INSERT INTO `sesiones` (`idSesiones`, `nombre`, `descripcion`, `fechaYhora`, `duracion`,`archivos`,`fecha`) VALUES ";
        $sql.=" (:idSesiones, :nombre, :descripcion, :fechaYhora, :duracion, :archivos,:fecha) ";
        return $this->ejecutarInserUpdate($sql, $sesiones);
    }

    public function actualizarsesiones(Sesiones $sesiones) {
        $sql = "UPDATE `sesiones` SET `nombre`=:nombre,`descripcion`=:descripcion,`fechaYhora`=:fechaYhora, ";
        $sql.="`duracion`=:duracion,`archivos`=:archivos, fecha`=:fecha ";
        $sql.=" WHERE idSesiones = :idSesiones ";
        return $this->ejecutarInserUpdate($sql, $sesiones);
    }

    private function ejecutarInserUpdate($sql, Sesiones $sesiones) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($sesiones);
        return $sentencia->execute($parametros);
    }

    private function getParametros(Sesiones $sesiones) {
        $parametros = array(
            ':idSesiones' => $sesiones->getIdSesiones(),
            ':nombre' => $sesiones->getNombre(),
            ':descripcion' => $sesiones->getDescripcion(),
            ':fechaYhora' => $sesiones->getFechaYhora(),
            ':duracion' => $sesiones->getDuracion(),
            ':archivos' => $sesiones->getArchivos(),
            ':fecha' => $sesiones->getFecha()
        );
        return $parametros;
    }
}

?>
