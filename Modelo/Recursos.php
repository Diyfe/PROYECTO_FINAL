<?php

/**
 * En esta clase se encapsulan los datos de los recursos que son identificadas como la tabla recursos dentro de la base de datos.
 * @author Felicia Daza  <feliciadazarodriguez@hotmail.com>
 * @author Diana Mier  <dianamier323@hotmail.com>
 */

class Recursos {
    /**
     *este es el nombre de los recursos.
     * @var type string
     */
    private $nombre;
    /**
     *esta es la url de los recursos 
     * @var type string
     */
    private $url;
    /**
     *estos son los archivos asociados de los recursos.
     * @var type string
     */
    private $archivosAsociados;
    /**
     *esta es la fecha de ingreso de los recursos. 
     * @var type Datetime
     */
    private $fecha;
    /**
     * retorna el nombre de los recursos.
     * @return type string
     */
    
    public function getNombre() {
        return $this->nombre;
    }
    /**
     * recibe el nombre de los recursos y se lo asigna a la clase recursos.
     * @param type $nombre
     */

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    /**
     * retorna la url de los recursos
     * @return type string 
     */

    public function getUrl() {
        return $this->url;
    }
    /**
     * recibe el parametro url de los recursos y se lo asigna a la clase recursos.
     * @param type $url
     */

    public function setUrl($url) {
        $this->url = $url;
    }
    /**
     * retorna los archivos asociados de los recursos.
     * @return type string
     */

    public function getArchivosAsociados() {
        return $this->archivosAsociados;
    }
    /**
     * recibe el parametro archivos asociados de los recursos y se lo asigna a la clase recursos.
     * @param type $archivosAsociados
     */

    public function setArchivosAsociados($archivosAsociados) {
        $this->archivosAsociados = $archivosAsociados;
    }
    /**
     * retorna la fecha de gestion de los recursos
     * @return type Datetime
     */

    public function getFecha() {
        return $this->fecha;
    }

    /**
     * recibe el parametro fecha de ingreso de los recursos y se los asigna a la clase recursos
     * @param type $fecha
     */
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}

?>
