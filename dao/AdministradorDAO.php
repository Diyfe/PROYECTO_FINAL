<?php


include_once  dirname(__FILE__).'\..\Configuracion\Configuracion.php';
include_once dirname(__FILE__).'\..\Modelo\Administrador.php';
include_once dirname(__FILE__).'\..\Modelo\Mapeador.php';

class AdministradorDAO {

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
        $sql = "SELECT * FROM administrador";
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
        $sql = "SELECT * FROM administrador WHERE idAdministrador = $documento";
        $sentencia = $this->getDb()->prepare($sql);
        $sentencia->execute();
        $filas = $sentencia->fetch();
        $persona = new Administrador();
        Mapeador::mapearAdministrador($persona, $filas);
        return $persona;
    }

    public function insertarAdministrador(Administrador $persona) {
        $sql = "INSERT INTO `administrador` (`idAdministrador`,`nombre`,`apellidos`,`fecha`) VALUES ";
        $sql.=" ( :idAdministrador, :nombre, :apellidos, :fecha) ";
        $resul = false;
        try {
            $resul = $this->ejecutarInserUpdate($sql, $persona);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $resul;
    }

    public function actualizarAdministrador(Administrador $persona) {
        $sql = "UPDTE `administrador` SET `nombre`=:nombre,`apellidos`=apellidos,`fecha`=:fecha ";
        $sql.=" WHERE idAdministrador = :idAdministrador";
        return $this->ejecutarInserUpdate($sql, $persona);
    }
    
    public function eliminarAdministrador(Administrador $persona) {
        $sql = "DELETE FROM administrador WHERE idAdministrador = :idAdministrador";
        return $this->ejecutarDelete($sql, $persona);
    }
    

    private function ejecutarInserUpdate($sql, Administrador $persona) {
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = $this->getParametros($persona);
        //return $sentencia->execute($parametros);
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
    }
    
    private function ejecutarDelete($sql, Administrador $persona){
        $sentencia = $this->getDb()->prepare($sql);
        $parametros = array(':idAdministrador' => $persona->getIdAministrador());
        $retorno = $sentencia->execute($parametros);
        if ($retorno == false) {
            self::lanzarErrorBD($this->getDb()->errorInfo());
        }
        return $retorno;
        
    }

    private function getParametros(Administrador $persona) {
        $parametros = array(
           ':idAdministrador' => $persona->getIdAministrador(),
            ':nombre' => $persona->getNombre(),
            ':apellidos' => $persona->getApellidos(),
            ':fecha' => date('Y-m-d G:i:s')
        );
        return $parametros;
    }


    public static function lanzarErrorBD($arrayError){
        throw new Exception("Error de operacion en BD: ".$arrayError[1]);
    }
}


?>
