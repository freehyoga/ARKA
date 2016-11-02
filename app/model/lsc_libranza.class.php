<?php
/*
 CLASE PARA LA GESTION DE LOS CLIENTES
*/
require_once "db.class.php";

class lsc_libranza extends database {
    
    private $id_libranza;
    private $cliente_tipoIdentificacion;
    private $cliente_identificacion;
    private $Nombre_Deud_Libra;
    private $Tipo_iden_Deud;
    private $Nume_Iden_Deud;
    private $Vlr_Cuot_Libra;
    private $Nro_Cuot_Libra;
    private $Vlr_Fin_Libra;
    
    function getId_libranza() {
        return $this->id_libranza;
    }

    function getCliente_tipoIdentificacion() {
        return $this->cliente_tipoIdentificacion;
    }

    function getCliente_identificacion() {
        return $this->cliente_identificacion;
    }

    function getNombre_Deud_Libra() {
        return $this->Nombre_Deud_Libra;
    }

    function getTipo_iden_Deud() {
        return $this->Tipo_iden_Deud;
    }

    function getNume_Iden_Deud() {
        return $this->Nume_Iden_Deud;
    }

    function getVlr_Cuot_Libra() {
        return $this->Vlr_Cuot_Libra;
    }

    function getNro_Cuot_Libra() {
        return $this->Nro_Cuot_Libra;
    }

    function getVlr_Fin_Libra() {
        return $this->Vlr_Fin_Libra;
    }

    function setId_libranza($id_libranza) {
        $this->id_libranza = $id_libranza;
    }

    function setCliente_tipoIdentificacion($cliente_tipoIdentificacion) {
        $this->cliente_tipoIdentificacion = $cliente_tipoIdentificacion;
    }

    function setCliente_identificacion($cliente_identificacion) {
        $this->cliente_identificacion = $cliente_identificacion;
    }

    function setNombre_Deud_Libra($Nombre_Deud_Libra) {
        $this->Nombre_Deud_Libra = $Nombre_Deud_Libra;
    }

    function setTipo_iden_Deud($Tipo_iden_Deud) {
        $this->Tipo_iden_Deud = $Tipo_iden_Deud;
    }

    function setNume_Iden_Deud($Nume_Iden_Deud) {
        $this->Nume_Iden_Deud = $Nume_Iden_Deud;
    }

    function setVlr_Cuot_Libra($Vlr_Cuot_Libra) {
        $this->Vlr_Cuot_Libra = $Vlr_Cuot_Libra;
    }

    function setNro_Cuot_Libra($Nro_Cuot_Libra) {
        $this->Nro_Cuot_Libra = $Nro_Cuot_Libra;
    }

    function setVlr_Fin_Libra($Vlr_Fin_Libra) {
        $this->Vlr_Fin_Libra = $Vlr_Fin_Libra;
    }

    function libranzasXCliente( $tipoIdent = NULL, $identifica = NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT l.* from lsc_libranza l "
                 . " inner join cliente c "
                 . " on c.tipoIdentificacion = l.cliente_tipoIdentificacion AND c.identificacion = l.cliente_identificacion where 1=1 ";

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
    
    function lscLibranzas($IdLibranza = NULL){
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT * from lsc_libranza "
                . "where 1=1 ";

        if( $IdLibranza != null && $IdLibranza != '' ){
            $consulta .= " AND IdLibranza = '" . $IdLibranza  ."'";                
        }
        $query = $this->consulta( $consulta . ";");
        $this->disconnect();
        if($this->numero_de_filas($query) > 0) // existe -> datos correctos
        {
            return $query;
        }else{
            return '';
       }
    }
    
    function insertarLscLibranza(){
    $this->conectar();
    $query = "INSERT INTO lsc_libranza VALUES "
            . "( '" . $this->id_libranza . "',"
            . "'" . $this->cliente_tipoIdentificacion . "',"
            . "'" . $this->cliente_identificacion . "',"
            . "'" . $this->Nombre_Deud_Libra . "',"
            . "'" . $this->Tipo_iden_Deud . "',"
            . "'" . $this->Nume_Iden_Deud . "',"
            . "'" . $this->Vlr_Cuot_Libra . "',"
            . "'" . $this->Nro_Cuot_Libra . "',"
            . "'" . $this->Vlr_Fin_Libra . "'"
            . ")" ;
    $save = $this->consulta( $query );    
    $this->disconnect();
    return $save;
     
 }
    
}