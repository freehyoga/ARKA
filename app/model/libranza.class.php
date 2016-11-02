<?php
/*
 CLASE PARA LA GESTION DE LOS CLIENTES
*/
require_once "db.class.php";

class libranza extends database {

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
        $this->lrMandato = $vlrMandato;
    }
    
    public function getVlrMandato() {
        return $this->vlrMandato;
    }
    
    function insertarLibranza(){
        $this->conectar();
        $query = "INSERT INTO mandato VALUES "
                . "( "
                . "'" . $this->tipoIdentificacion . "',"
                . "'" . $this->identificacion . "',"
                . "'" . $this->estaMandato . "',"
                . "'" . $this->vlrMandato . "'"
                . ")" ;
        $save = $this->consulta( $query );
        $this->disconnect();
        return $save; 
    }
    
    function libranzasXMandato( $mandato_id = NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT l.*,format(l.Vlr_Fin_Libra,2) as Vlr_Fin_Libra_format, format(l.Vlr_Cuot_Libra,2) as Vlr_Cuot_Libra_format from libranza l where 1=1 ";

       if( $mandato_id != null && $mandato_id != '' && $mandato_id != '0' ){
           $consulta .= " AND mandato_id_mandato = '" . $mandato_id ."'";
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
    
    function libranzasXCliente( $tipoIdent = NULL, $identifica = NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT l.*,format(l.Vlr_Fin_Libra,2) as Vlr_Fin_Libra_format, format(l.Vlr_Cuot_Libra,2) as Vlr_Cuot_Libra_format from libranza l "
                 . " inner join mandato m on m.id_mandato = l.Mandato_Id_mandato inner join cliente c "
                 . " on c.tipoIdentificacion = m.tipoIdentificacion AND c.identificacion = m.identificacion where 1=1 ";

        if( $tipoIdent != null && $tipoIdent != '' && $tipoIdent != '0' ){
            $consulta .= " AND c.tipoIdentificacion = '" . $tipoIdent ."'";
        }
        if( $identifica != null && $identifica != '' ){
            $consulta .= " AND c.identificacion = '" . $identifica ."'";
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
    
    function libranzasAsociar( )
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = 
              "SELECT lt.*, format(lt.Vlr_Fin_Libra,2) as Vlr_Fin_Libra_format, format(lt.Vlr_Cuot_Libra,2) as Vlr_Cuot_Libra_format "
            . "FROM libranzatemp lt "
            . "LEFT JOIN libranza l ON "
            . "lt.idLibranza = l.idLibranza "
            . "AND lt.Proveedor_TipoIdentificacion = l.Proveedor_TipoIdentificacion "
            . "AND lt.Proveedor_Identificacion = l.Proveedor_Identificacion "
            . "WHERE l.idLibranza IS NULL";

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
    
    function asociarMandato( $mandato, $idLibranza, $tipoId , $idProveedor){
        $this->conectar();
        $query = 
        "INSERT INTO libranza "
        . "(idLibranza, Proveedor_TipoIdentificacion, Proveedor_Identificacion,Mandato_Id_mandato,"
        . " Nombre_Deud_Libra, Tipo_Iden_Deud, Nume_Iden_Deud, Vlr_Cuot_Libra, Nro_Cuot_Libra, Vlr_Fin_Libra) "
        . " SELECT idLibranza, Proveedor_TipoIdentificacion, Proveedor_Identificacion,'". $mandato ."', Nombre_Deud_Libra, " 
        . " Tipo_Iden_Deud, Nume_Iden_Deud, Vlr_Cuot_Libra, Nro_Cuot_Libra, Vlr_Fin_Libra "
        . " FROM libranzatemp WHERE Proveedor_Identificacion = '" .$idProveedor . "' AND idLibranza = '" .$idLibranza ."' ";
        $save = $this->consulta( $query );
        $this->disconnect();
        return $save;
    }
    
    function desAsociarMandato( $mandato, $idLibranza, $proveedor){
        $this->conectar();
        $query = 
        "DELETE FROM libranza "
        . " WHERE Proveedor_Identificacion = '" .$proveedor . "' AND idLibranza = '" .$idLibranza ."' "
        . " AND Mandato_id_mandato = '" . $mandato ."' ";
        $save = $this->consulta( $query );
        $this->disconnect();
        return $save;
    }
    
    
}