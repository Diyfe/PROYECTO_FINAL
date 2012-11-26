<?php
/**
 * En esta clase se encapsulan los datos de las personas que son identificadas como administradores dentro de la base de datos.
 * @author Felicia Daza  <feliciadazarodriguez@hotmail.com>
 * @author Diana Mier  <dianamier323@hotmail.com>
 */
class Administrador {
     /**
     * documento de identidad del administrador.
     * @var integer
     */
    private $idAministrador;
   /**
    *este es el nombre del administrador
    * @var type string
    */ 
   
    private $nombre;
    /**
     *este es el apellido del administrador
     * @var type string
     */
    private $apellidos;
    /**
     *
     * @var type Datetime
     */
    private $fecha;
    
    private $Persona_idPersona;
    
    public function getPersona_idPersona() {
        return $this->Persona_idPersona;
    }

    public function setPersona_idPersona($Persona_idPersona) {
        $this->Persona_idPersona = $Persona_idPersona;
    }

        public function getIdAministrador() {
        return $this->idAministrador;
    }

    public function setIdAministrador($idAministrador) {
        $this->idAministrador = $idAministrador;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

        
   
    /**
     * retorna el documento de identidad del administrador.
     * @return type integer
     */
   /** public function getIdAministrador() {
        return $this->idAministrador;
    }
    /**
     *recibe el parametro documento y se lo asigna a la clase administrador.
     * @param type $idAministrador
     */

/**
    public function setIdAministrador($idAministrador) {
        $this->idAministrador = $idAministrador;
    }
    /**
     * retorna el nombre del administrador.
     * @return type string
     */
/**
    public function getnombre() {
        return $this->nombre;
    }
    /**
     *recibe el parametro nombre y se lo asigna a la clase administrador.
     * @param type $nombre
     */
/**
    public function setnombre($Nombre) {
        $this->Nombre = $Nombre;
    }
    /**
    * retorna los apellidos del administrador
    * @return type string
    */
   /**
    public function getApellidos() {
        return $this->Apellidos;
    }
    /**
     * recibe el parametro Apellido y se lo asigna a la clase administrador.
     * @param type $apellido
     */
    /**
    public function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }
    /**
     * retorna la fecha de ingreso del administrador a la base de datos
     * @return type Datetime
     */
    /**
    public function getFecha() {
        return $this->Fecha;
    }
    /**
     * recibe el parametro fecha y se lo asigna a la clase administrador.
     * @param type $fecha
     */
/**
    public function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    } **/

}

?>
