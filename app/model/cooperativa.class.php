<?php
/*Clase para la gestion de la cooperativa*/
require_once "db.class.php";

class cooperativa extends database{
    
    private $tipoIDCoop;
    private $siglaCoop;    
    private $raznSoclCoop;
    private $numeIdenProv;
    private $DirCoop;
    private $paginaCoop;
    private $telCoop;
    private $NomReprLCoop;
    private $tipoIdRepre;
    private $numeIdenRepre;
    private $celRepreCoop;
    private $mailReprCoop;
    
    function getTipoIDCoop() {
        return $this->tipoIDCoop;
    }

    function getSiglaCoop() {
        return $this->siglaCoop;
    }

    function getRaznSoclCoop() {
        return $this->raznSoclCoop;
    }

    function getNumeIdenProv() {
        return $this->numeIdenProv;
    }

    function getDirCoop() {
        return $this->DirCoop;
    }

    function getPaginaCoop() {
        return $this->paginaCoop;
    }

    function getTelCoop() {
        return $this->telCoop;
    }

    function getNomReprLCoop() {
        return $this->NomReprLCoop;
    }

    function getDatosEnvioCoop() {
        return $this->datosEnvioCoop;
    }

    function getNumeIdenRepre() {
        return $this->numeIdenRepre;
    }

    function getCelRepreCoop() {
        return $this->celRepreCoop;
    }

    
    function setTipoIDCoop($tipoIDCoop) {
        $this->tipoIDCoop = $tipoIDCoop;
    }

    function setSiglaCoop($siglaCoop) {
        $this->siglaCoop = $siglaCoop;
    }

    function setRaznSoclCoop($raznSoclCoop) {
        $this->raznSoclCoop = $raznSoclCoop;
    }

    function setNumeIdenProv($numeIdenProv) {
        $this->numeIdenProv = $numeIdenProv;
    }

    function setDirCoop($DirCoop) {
        $this->DirCoop = $DirCoop;
    }

    function setPaginaCoop($paginaCoop) {
        $this->paginaCoop = $paginaCoop;
    }

    function setTelCoop($telCoop) {
        $this->telCoop = $telCoop;
    }

    function setDatosEnvioCoop($datosEnvioCoop) {
        $this->datosEnvioCoop = $datosEnvioCoop;
    }

    function setNumeIdenRepre($numeIdenRepre) {
        $this->numeIdenRepre = $numeIdenRepre;
    }

    function setCelRepreCoop($celRepreCoop) {
        $this->celRepreCoop = $celRepreCoop;
    }

    function setNomReprLCoop($NomReprLCoop) {
        $this->NomReprLCoop = $NomReprLCoop;
    }

    function getTipoIdRepre() {
        return $this->tipoIdRepre;
    }

    function getMailReprCoop() {
        return $this->mailReprCoop;
    }

    function setTipoIdRepre($tipoIdRepre) {
        $this->tipoIdRepre = $tipoIdRepre;
    }

    function setMailReprCoop($mailReprCoop) {
        $this->mailReprCoop = $mailReprCoop;
    }

    function cooperativas( $tipoIden=NULL , $Ident=NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT ti.identificacion as TipoIdentificacion, p.Nume_iden_Coop, p.Razo_Soci_Coop,"
                 . "p.Sigla_Coop, p.Pagi_Web_Coop, p.Tel_fijo_Coop, p.Nomb_Repre_Legal_Prov, p.Tipo_Iden_Repr_Prov, "
                 . "p.Nume_Iden_Repre_Prov, p.Celu_repr_Prov,p.Email_Repre_Prov"
                 . " FROM proveedor p,tipoIdentificacion ti where p.Tipo_iden_Coop = ti.tipoIdentificacion  ";

       if( $tipoIden != null && $tipoIden != '' ){
           $consulta .= " AND p.Tipo_Iden_Coop = '" . $tipoIden ."'";
       }
       if( $Ident != null && $Ident != '' ){
           $consulta .= " AND p.Nume_iden_Coop = '" . $Ident ."'" ;
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
    
    function InsertarCoop(){
        $this->conectar();
        $query = "INSERT INTO proveedor VALUES "
                . "( '" . $this->tipoIDCoop . "',"
                . "'" . $this->numeIdenProv . "',"
                . "'" . $this->raznSoclCoop . "',"
                . "'" . $this->siglaCoop . "',"
                . "'" . $this->paginaCoop . "',"
                . "'" . $this->telCoop . "',"
                . "'" . $this->NomReprLCoop . "',"
                . "'" . $this->tipoIdRepre . "',"
		. "'" . $this->numeIdenRepre . "',"
		. "'" . $this->celRepreCoop . "',"
		. "'" . $this->mailReprCoop . "'"
                . ")" ;
        $save = $this->consulta( $query );
        $this->disconnect();
        return $save;
     
 }
    
}

?>