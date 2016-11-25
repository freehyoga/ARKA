<?php
/*
 CLASE PARA LA GESTION DE LOS CLIENTES
*/
require_once "db.class.php";

class mandato extends database {

    private $id_mandato;
    private $tipoMandato;
    private $tipoIdentificacion;
    private $identificacion;
    private $porcDescAdmin;
    private $fechaCreacion;
    private $valoConsig;
    private $porcDescCorre;
    
    function getTipoMandato() {
        return $this->tipoMandato;
    }

    function getPorcDescAdmin() {
        return $this->porcDescAdmin;
    }

    function getValoConsig() {
        return $this->valoConsig;
    }

    function getPorcDescCorre() {
        return $this->porcDescCorre;
    }

    function setTipoMandato($tipoMandato) {
        $this->tipoMandato = $tipoMandato;
    }

    function setPorcDescAdmin($porcDescAdmin) {
        $this->porcDescAdmin = $porcDescAdmin;
    }

    function setValoConsig($valoConsig) {
        $this->valoConsig = $valoConsig;
    }

    function setPorcDescCorre($porcDescCorre) {
        $this->porcDescCorre = $porcDescCorre;
    }

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
                . "(" . $this->id_mandato . ","
                . "'" . $this->tipoMandato . "',"
                . "'" . $this->identificacion . "',"
                . "'" . $this->tipoIdentificacion . "',"
                . "'" . $this->porcDescAdmin . "',"
                . "NOW(),"
                . "'" . $this->valoConsig . "',"
                . "'" . $this->porcDescCorre . "'"
                . ")" ;
        $save = $this->insercion( $query );
        
        $this->disconnect();
        return $save; 
    }
    
    function mandatos( $tipoIden=NULL , $Ident=NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT m.id_mandato  FROM mandato m WHERE m.id_mandato = (select max(id_mandato) from mandato)";

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