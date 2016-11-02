<?php
/*
 CLASE PARA LA GESTION DE LOS CLIENTES
*/
require_once "db.class.php";

class mandato extends database {

    private $id_mandato;
    private $tipoIdentificacion;
    private $identificacion;
    private $estaMandato;
    private $vlrMandato;
    private $fechaCreacion;
    
    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }
 
    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }
    
    public function getId_Mandato() {
        return $this->id_mandato;
    }
 
    public function setId_Mandato($id_mandato) {
        $this->id_mandato = $id_mandato;
    }
    
    public function getTipoIdentificacion() {
        return $this->tipoIdentificacion;
    }
 
    public function setTipoIdentificacion($tipoIdentificacion) {
        $this->tipoIdentificacion = $tipoIdentificacion;
    }
    
    public function getIdentificacion() {
        return $this->tipoIdentificacion;
    }
    
    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }
    
    public function setEstaMandato($estaMandato) {
        $this->estaMandato = $estaMandato;
    }
    
    public function getEstaMandato() {
        return $this->estaMandato;
    }
    
    public function setVlrMandato($vlrMandato) {
        $this->vlrMandato = $vlrMandato;
    }
    
    public function getVlrMandato() {
        return $this->vlrMandato;
    }
    
    function insertarMandato(){
        $this->conectar();
        $query = "INSERT INTO mandato VALUES "
                . "( null,"
                . "'" . $this->identificacion . "',"
                . "'" . $this->tipoIdentificacion . "',"
                . "'" . $this->estaMandato . "',"
                . "'" . $this->vlrMandato . "',"
                . "NOW())" ;
        $save = $this->insercion( $query );
        
        $this->disconnect();
        return $save; 
    }
    
    function mandatos( $tipoIden=NULL , $Ident=NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT m.id_mandato,em.nombre, format(vlr_mandato,2) as vlr_mandato , m.fecha_creacion  FROM mandato m, estado_mandato em where em.esta_mandato= m.esta_mandato ";

       if( $tipoIden != null && $tipoIden != '' && $tipoIden != '0' ){
           $consulta .= " AND tipoIdentificacion = '" . $tipoIden ."'";
       }
       if( $Ident != null && $Ident != '' ){
           $consulta .= " AND identificacion = '" . $Ident ."'" ;
       }

       $query = $this->consulta( $consulta . ";");
           $this->disconnect();
       if($this->numero_de_filas($query) > 0) // existe -> datos correctos
       {
         return $query;
       }else
       {
        return '';
       }
    }
    
    function infoMandato( $mandato=NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT * FROM mandato where id_mandato = '" . $mandato . "'";
       
       $query = $this->consulta( $consulta . ";");
           $this->disconnect();
       if($this->numero_de_filas($query) > 0) // existe -> datos correctos
       {
         return $query;
       }else
       {
        return '';
       }
    }
}