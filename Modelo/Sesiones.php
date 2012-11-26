<?php

/**
 * En esta clase se encapsulan los datos de las sesiones que son identificadas como la tabla sesiones dentro de la base de datos.
 * @author Felicia Daza  <feliciadazarodriguez@hotmail.com>
 * @author Diana Mier  <dianamier323@hotmail.com>
 */
class Sesiones {
    /**
     *este es el codigo de las sesiones.
     * @var type integer
     */
    private $idSesiones;
    /**
     *este es el nombre de las sesiones.
     * @var type string
     */
    private $nombre;
    /**
     *esta es la descripcion de las sesiones.
     * @var type string
     */
    private $descripcion;
    /**
     *esta es la fecha y hora en que se ingresan las sesiones.
     * @var type Datetime
     */
    private $fechaYhora;
    /**
     *esta es la durancion de las sesiones.
     * @var type string
     */
    private $duracion;
    /**
     *estos son los archivos de las sesiones.
     * @var type string
     */
    private $archivos;
    /**
     *esta es la fecha en que se ingresan las sesiones.
     * @var type Datetime
     */
    private $fecha;
    /**
     * retorna el codigo de identificacion de las sesiones.
     * @return type integer
     */
    
    public function getIdSesiones() {
        return $this->idSesiones;
    }
    /**
     * recibe el paremetro idsesiones y se lo asigna a la clase persona.
     * @param type $idSesiones
     */

    public function setIdSesiones($idSesiones) {
        $this->idSesiones = $idSesiones;
    }
    /**
     * retorna el nombre de las sesion.
     * @return type string
     */

    public function getNombre() {
        return $this->nombre;
    }
    /**
     * recibe el parametro nombre y se lo asigna a la clase sesiones.
     * @param type $nombre
     */

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    /**
     * retorna la descripcion de las sesiones 
     * @return type string
     */

    public function getDescripcion() {
        return $this->descripcion;
    }
    /**
     * recibe el parametro descripcion y se lo asigna a la clase sesiones.
     * @param type $descripcion
     */

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    /**
     * retorna la fecha y la hora en que inician las sesiones.
     * @return type Datetime
     */

    public function getFechaYhora() {
        return $this->fechaYhora;
    }
    /**
     * recibe el parametro fecha y hora y se lo asigna a la clase sesiones.
     * @param type $fechaYhora
     */

    public function setFechaYhora($fechaYhora) {
        $this->fechaYhora = $fechaYhora;
    }
    /**
     * retorna la duracion de las sesiones.
     * @return type string
     */

    public function getDuracion() {
        return $this->duracion;
    }
    /**
     * recibe el parametro duracion y se lo asigna a la clase sesiones
     * @param type $duracion
     */

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }
    /**
     * retorna los archivos de las sesiones
     * @return type string
     */

    public function getArchivos() {
        return $this->archivos;
    }
    /**
     * recibe el parametro archivos y se los asigna a la clase sesiones.
     * @param type $archivos
     */

    public function setArchivos($archivos) {
        $this->archivos = $archivos;
    }
    /**
     *retorna la fecha en que se gestiona el campo sesiones
     * @return type Datetime
     */

    public function getFecha() {
        return $this->fecha;
    }
    /**
     * recibe el parametro fecha y se la asigna a la tabla sesiones
     * @param type $fecha
     */

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}

?>
