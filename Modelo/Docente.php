<?php

/**
 * En esta clase se encapsulan los datos de las personas que son identificadas como docentes dentro de la base de datos.
 * @author Felicia Daza  <feliciadazarodriguez@hotmail.com>
 * @author Diana Mier  <dianamier323@hotmail.com>
 */
class Docente {
    /**
     *este es el documento de identidad del docente.
     * @var type integer
     */
    private $idDocente; 
    /**
     *este es el nombre del docente.
     * @var type string
     */
    private $nombres;
    /**
     *estos son los apellidos del docente.
     * @var type string
     */
    private $apellidos;
    /**
     *este es el  correo del docente
     * @var type string
     */
    private $email;
    /**
     *esta es la direccion del docente.
     * @var type string 
     */
    private $direccion;
    /**
     *este es el telefono del docente.
     * @var type integer
     */
    private $telefono;
    /**
     *esta es la fecha en la que ingre el docente a la base de datos.
     * @var type Datetime
     */
    private $fecha;
    /**
     * retorna el documentode identidad del docente.
     * @return type integer
     */
    public function getIdDocente() {
        return $this->idDocente;
    }
    /**
     * recibe el parametro documento y se lo asigna a la clase docente.
     * @param type $idDocente
     */

    public function setIdDocente($idDocente) {
        $this->idDocente = $idDocente;
    }
    /**
     * retorna el nombre del docente
     * @return type string
     */

    public function getNombres() {
        return $this->nombres;
    }
    /**
     * recibe el parametro nombre y se lo asigna a la clase persona.
     * @param type $nombres
     */

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }
    /**
     * retorna el apellido del docente 
     * @return type string
     */

    public function getApellidos() {
        return $this->apellidos;
    }
    /**
     * recibe el parametro apellido y se lo asigna a la clase docente.
     * @param type $apellidos
     */

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    /**
     * retorna el correo del docente.
     * @return type string
     */

    public function getEmail() {
        return $this->email;
    }
    /**
     *recibe el parametro email y se la asigna a la clase docente.
     * @param type $email
     */

    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * retorna la direccion del docente
     * @return type direccion
     */
    public function getDireccion() {
        return $this->direccion;
    }
    /**
     * recibe el parametro direccion y se la asigna a la clase docente.
     * @param type $direccion
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    /**
     *retorna el telefono del docente 
     * @return type string
     */
    public function getTelefono() {
        return $this->telefono;
    }
    /**
     * recibe el parametro telefono y se lo asigna a la clase docente.
     * @param type $telefono
     */

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    /**
     * retorna la fecha en que ingresa el docente a la base de datos
     * @return type Datefecha
     */
    public function getFecha() {
        return $this->fecha;
    }
    
    /**
     * recibe el parametro fecha y se lo asigna a la clase docente.
     * @param type $fecha
     */

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}

?>
