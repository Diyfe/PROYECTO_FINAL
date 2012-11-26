<?php
/**
 * En esta clase se encapsulan los datos de las personas que son identificadas como la tabla personas dentro de la base de datos.
 * @author Felicia Daza  <feliciadazarodriguez@hotmail.com>
 * @author Diana Mier  <dianamier323@hotmail.com>
 */


class Persona {
  /**
   *codigo de la persona
   * @var type integer
   */
    private $idPersona;
    
    /**
     *este es el nombre de la persona
     * @var type string
     */
    private $nombre;
    /**
     *este es el apellido de la persona.
     * @var type string
     */
    private $apellidos;
    
    /**
     *este es el telefono de la persona
     * @var type integer
     */
    private $telefono;
    /**
     *este es el correo de la persona.
     * @var type string
     */
    
    private $email;
    /**
     * fecha en que la persona ingreso a la base de datos.
     * @var type Datetime
     */
    
     private $fecha;
    /**
     *retorna el documento de identidad de la persona.
     * @return  integer
     */
     private $usuario;
     private $contrasena;
     public function getContrasena() {
         return $this->contrasena;
     }

     public function setContrasena($contrasena) {
         $this->contrasena = $contrasena;
     }

          
     public function getUsuario() {
         return $this->usuario;
     }

     public function setUsuario($usuario) {
         $this->usuario = $usuario;
     }


          public function getIdPersona() {
            return $this->idPersona;
        }
        /**
         * recibe el parametro idpersona y se lo asigna a la clase persona.
         * @param type $idPersona
         */

        public function setIdPersona($idPersona) {
            $this->idPersona = $idPersona;
        }
        /**
         * retorna el nombre de la persona.
         * @return  string
         */

        public function getNombre() {
            return $this->nombre;
        }

        /**
         * recibe el nombre y se lo asigna a persona.
         * @param type $nombre
         */
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        /**
         * retorna el apellido de la persona
         * @return  string
         */
        public function getApellidos() {
            return $this->apellidos;
        }
        /**
         * recibe el apellido y se lo asigna a persona.
         * @param type $apellidos
         */
        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }
        /**
         * retorna el telefono de la persona.
         * @return integer
         */
        public function getTelefono() {
            return $this->telefono;
        }
        /**
         * recibe el telefono y se lo asigna a persona.
         * @param type $telefono
         */
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        /**
         * retorna el correo de la persona.
         * @return type string
         */
        public function getEmail() {
            return $this->email;
        }
        /**
         * recibe el correo y se lo asigna a persona.
         * @param type $email
         */
        
        public function setEmail($email) {
            $this->email = $email;
        }
        /**
         * retorna la fecha en que ingresa la persona 
         * @return type Datetime
         */
        
        public function getFecha() {
            return $this->fecha;
        }
        /**
         * recibe la fecha en que ingresa la persona a la base de datos y se la signa a la clase persona
         * @param type $fecha
         */
       
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }


        
}

?>
