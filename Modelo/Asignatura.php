<?php

/**
 * En esta clase se encapsulan los datos de las asignaturas que son identificadas como  la tabla asignatura dentro de la base de datos.
 * @author Felicia Daza  <feliciadazarodriguez@hotmail.com>
 * @author Diana Mier  <dianamier323@hotmail.com>
 */

class Asignatura {
    /**
     *este es el codigo de la asignatura.
     * @var type string
     */
    private $idAsignatura;
    private $idDocente;
    /**
     *este es el nombre de la asignatura.
     * @var type string
     */
    private $nombre;
    /**
     *este es el contenido de la asignatura.
     * @var type string
     */
    private $contenido;
    /**
     *esta es la metodologia de la materia.
     * @var type string
     */
    private $metodologia;
    /**
     *esta es la bibliografia de la asignatura.
     * @var type string
     */
    private $bibliografia;
    /**
     *esta es la fecha de entrada de la asignatura.
     * @var type Datetime
     */
    private $fecha;
    /**
     * retorna el codigo de la materia.
     * @return type integer
     */
    public function getIdDocente() {
        return $this->idDocente;
    }

    public function setIdDocente($idDocente) {
        $this->idDocente = $idDocente;
    }

        public function getIdAsignatura() {
        return $this->idAsignatura;
    }
    /**
     * recibe el parametro codigo de asignatura y se lo asigna a la clase asignatura
     * @param type $idAsignatura
     */

    public function setIdAsignatura($idAsignatura) {
        $this->idAsignatura = $idAsignatura;
    }
    /**
     * retorna el nombre de la asignatura
     * @return type nombre
     */

    public function getNombre() {
        return $this->nombre;
    }
    /**
     *recibe el parametro nombre y se lo asigna a la clase asignatura. 
     * @param type $nombre
     */

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    /**
     * retorna el contenido de la asignatura.
     * @return type string
     */

    public function getContenido() {
        return $this->contenido;
    }
    /**
     * recibe el parametro contenido y se lo asigna a la clase asignatura.
     * @param type $contenido
     */
    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }
    /**
     * retorna la  metodologia de la materia 
     * @return type string
     */
    public function getMetodologia() {
        return $this->metodologia;
    }
    /**
     * recibe el parametro metodolgia y se lo asigna a la clase asignatura.
     * @param type $metodologia
     */

    public function setMetodologia($metodologia) {
        $this->metodologia = $metodologia;
    }
    /**
     * retorna la bibliografia.
     * @return type strimg
     */

    public function getBibliografia() {
        return $this->bibliografia;
    }
    /**
     * recibe el parametro bibliografia y se la asigna a la clase asignatura.
     * @param type $bibliografia
     */

    public function setBibliografia($bibliografia) {
        $this->bibliografia = $bibliografia;
    }
    /**
     * retorna la fecha de gestion de la asignatura.
     * @return type Datetime
     */

    public function getFecha() {
        return $this->fecha;
    }
    /**
     * recibe el parametro fecha y se lo asigna a la clase asignatura.
     * @param type $fecha
     */

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }


   
}

?>
