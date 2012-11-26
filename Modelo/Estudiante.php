<?php

/**
 * En esta clase se encapsulan los datos de las personas que son identificadas como estudiante dentro de la base de datos.
 * @author Felicia Daza  <feliciadazarodriguez@hotmail.com>
 * @author Diana Mier  <dianamier323@hotmail.com>
 */
class Estudiante {
    /**
     *este es el documento de identidad del estudiante..
     * @var type integer
     */
    private $idEstudiante;
    /**
     *este es el nombre del estudiante.
     * @var type integer
     */
    private $nombres;
    /**
     *estos son los apellidos del estudiante.
     * @var type string
     */
    private $apellidos;
    /**
     *este es el correo del estudiante
     * @var type sring
     */
    private $email;
    /**
     *este es el telefono del estudiante
     * @var type integer
     */
    private $telefono;
    /**
     *esta es la direccion del estudiante.
     * @var type string
     */
    private $direccion;
    /**
     *esta es la fecha de ingroso del estudiante.
     * @var type Datetime
     */
    private $fecha;
    /**
     * retorna el documento de identidad del estudiante.
     * @return type integer
     */
    
    public function getIdEstudiante() {
        return $this->idEstudiante;
    }
    /**
     * recibe el parametro documento y se lo asigna a la clase estudiante.
     * @param type $idEstudiante
     */

    public function setIdEstudiante($idEstudiante) {
        $this->idEstudiante = $idEstudiante;
    }
    /**
     * retorna el nombre del estudiante.
     * @return type string
     */

    public function getNombres() {
        return $this->nombres;
    }
    /**
     * recibe el parametro nombre y se le asigna a la clase estudiantes.
     * @param type $nombres
     */

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }
    /**
     * retorna el apellido del estudiante. 
     * @return type string
     */

    public function getApellidos() {
        return $this->apellidos;
    }
    /**
     * recibe el parametro apellido y se lo asigna a la clase estudiantes.
     * @param type $apellidos
     */

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    /**
     * retorna el email del esudiante.
     * @return type string
     */

    public function getEmail() {
        return $this->email;
    }
    /**
     * recibe el parametro email y se lo asigna a la clase estudiante.
     * @param type $email
     */

    public function setEmail($email) {
        $this->email = $email;
    }
    /**
     * retorna el telefono del estudiante.
     * @return type integer
     */

    public function getTelefono() {
        return $this->telefono;
    }
    /**
     * recibe el parametro telefono y se lo asigna a la clase estudiante.
     * @param type $telefono
     */

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    /**
     * retorna la direccion del estudiante.
     * @return type string
     */

    public function getDireccion() {
        return $this->direccion;
    }
    /**
     * recibe el parametro direccion y se la asigna a la clase persona.
     * @param type $direccion
     */

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    /**
     * retorna la fecha en que ingresa el estudiante.
     * @return type Datetime
     */

    public function getFecha() {
        return $this->fecha;
    }
    /**
     * recibe el parametro fecha y se lo asigna a la clase estudiante.
     * @param type $fecha
     */

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}

?>
