<?php
/*
 CLASE PARA LA GESTION DE LOS CLIENTES
*/
require_once "db.class.php";

class cliente extends database {

    private $tipoIdentificacion;
    private $identificacion;
    private $nombres;
    private $apellidos;

    private $fechaExpeMan;
    private $paisExped ;
    private $deptoExped;
    private $ciudadExped ;
    private $fechaNacimiento;
    private $genero;
    private $paisNaci;
    private $deptoNaci;
    private $ciudadNaci;
    private $nacionalidad;
    private $sinoNaciona;
    private $observNaciona;
    private $sinoReside;
    private $observReside;
    private $nivelEduca;
    private $observNivelEdu ;
    private $tipoVivien;
    private $observTipoVivind; 	
    private $ciudadReside;
    private $estadoCivil;
    private $direccionClie  ;	
    private $telFijo;
    private $celularClie;
    private $email;    
    
    private $nombrsConyg ;             
    private $apelldsConyg ;            
    private $numIdentfcnConyg ;        
    private $tipoIdentfcnConyg ;       
    private $fijoConyg ;               
    private $ocupcn ;                  
    private $observOcupcn ;            
    private $tipoEmprs ;               
    private $NitEmpre ;                
    private $Sector ;                  
    private $Empresa ;                 
    private $TelEmpresa ;              
    private $DirEmpresa ;              
    private $CargoEmpresa ;            
    private $SueldoActual ;            
    private $tipoContr ;               
    private $fechVincEmpr ;            
    private $RecursPublc ;             
    private $ObsRecuPubl ;             
    private $VincRecursPublc ;         
    private $DeclaraRenta ;            
    private $SocioEmpre ;              
    private $PorceSoci ;               
    private $RegiTribu ;               
    private $Monedaextra ;             
    private $TipoOpeExtra ;            
    private $OtraOperExtra ;           
    private $IngreFijo ;               
    private $IngreVari ;               
    private $otroIngre1 ;              
    private $otroIngre2 ;              
    private $Hipoteca ;                
    private $EgreCredi ;               
    private $gastoFami ;               
    private $otroEngre ;               
    private $TotalEgr ;                
    private $Vivienda ;                
    private $Vehiculos ;               
    private $Inver ;                   
    private $otroAct ;                 
    private $TotalAct ;                
    private $PasHipo ;                 
    private $PasTc ;                   
    private $otrObli ;                 
    private $otroPas ;                 
    private $TotalPas;
    
    function getNombrsConyg() {
        return $this->nombrsConyg;
    }

    function getApelldsConyg() {
        return $this->apelldsConyg;
    }

    function getNumIdentfcnConyg() {
        return $this->numIdentfcnConyg;
    }

    function getTipoIdentfcnConyg() {
        return $this->tipoIdentfcnConyg;
    }

    function getFijoConyg() {
        return $this->fijoConyg;
    }

    function getOcupcn() {
        return $this->ocupcn;
    }

    function getObservOcupcn() {
        return $this->observOcupcn;
    }

    function getTipoEmprs() {
        return $this->tipoEmprs;
    }

    function getNitEmpre() {
        return $this->NitEmpre;
    }

    function getSector() {
        return $this->Sector;
    }

    function getEmpresa() {
        return $this->Empresa;
    }

    function getTelEmpresa() {
        return $this->TelEmpresa;
    }

    function getDirEmpresa() {
        return $this->DirEmpresa;
    }

    function getCargoEmpresa() {
        return $this->CargoEmpresa;
    }

    function getSueldoActual() {
        return $this->SueldoActual;
    }

    function getTipoContr() {
        return $this->tipoContr;
    }

    function getFechVincEmpr() {
        return $this->fechVincEmpr;
    }

    function getRecursPublc() {
        return $this->RecursPublc;
    }

    function getObsRecuPubl() {
        return $this->ObsRecuPubl;
    }

    function getVincRecursPublc() {
        return $this->VincRecursPublc;
    }

    function getDeclaraRenta() {
        return $this->DeclaraRenta;
    }

    function getSocioEmpre() {
        return $this->SocioEmpre;
    }

    function getPorceSoci() {
        return $this->PorceSoci;
    }

    function getRegiTribu() {
        return $this->RegiTribu;
    }

    function getMonedaextra() {
        return $this->Monedaextra;
    }

    function getTipoOpeExtra() {
        return $this->TipoOpeExtra;
    }

    function getOtraOperExtra() {
        return $this->OtraOperExtra;
    }

    function getIngreFijo() {
        return $this->IngreFijo;
    }

    function getIngreVari() {
        return $this->IngreVari;
    }

    function getOtroIngre1() {
        return $this->otroIngre1;
    }

    function getOtroIngre2() {
        return $this->otroIngre2;
    }

    function getHipoteca() {
        return $this->Hipoteca;
    }

    function getEgreCredi() {
        return $this->EgreCredi;
    }

    function getGastoFami() {
        return $this->gastoFami;
    }

    function getOtroEngre() {
        return $this->otroEngre;
    }

    function getTotalEgr() {
        return $this->TotalEgr;
    }

    function getVivienda() {
        return $this->Vivienda;
    }

    function getVehiculos() {
        return $this->Vehiculos;
    }

    function getInver() {
        return $this->Inver;
    }

    function getOtroAct() {
        return $this->otroAct;
    }

    function getTotalAct() {
        return $this->TotalAct;
    }

    function getPasHipo() {
        return $this->PasHipo;
    }

    function getPasTc() {
        return $this->PasTc;
    }

    function getOtrObli() {
        return $this->otrObli;
    }

    function getOtroPas() {
        return $this->otroPas;
    }

    function getTotalPas() {
        return $this->TotalPas;
    }

    function setNombrsConyg($nombrsConyg) {
        $this->nombrsConyg = $nombrsConyg;
    }

    function setApelldsConyg($apelldsConyg) {
        $this->apelldsConyg = $apelldsConyg;
    }

    function setNumIdentfcnConyg($numIdentfcnConyg) {
        $this->numIdentfcnConyg = $numIdentfcnConyg;
    }

    function setTipoIdentfcnConyg($tipoIdentfcnConyg) {
        $this->tipoIdentfcnConyg = $tipoIdentfcnConyg;
    }

    function setFijoConyg($fijoConyg) {
        $this->fijoConyg = $fijoConyg;
    }

    function setOcupcn($ocupcn) {
        $this->ocupcn = $ocupcn;
    }

    function setObservOcupcn($observOcupcn) {
        $this->observOcupcn = $observOcupcn;
    }

    function setTipoEmprs($tipoEmprs) {
        $this->tipoEmprs = $tipoEmprs;
    }

    function setNitEmpre($NitEmpre) {
        $this->NitEmpre = $NitEmpre;
    }

    function setSector($Sector) {
        $this->Sector = $Sector;
    }

    function setEmpresa($Empresa) {
        $this->Empresa = $Empresa;
    }

    function setTelEmpresa($TelEmpresa) {
        $this->TelEmpresa = $TelEmpresa;
    }

    function setDirEmpresa($DirEmpresa) {
        $this->DirEmpresa = $DirEmpresa;
    }

    function setCargoEmpresa($CargoEmpresa) {
        $this->CargoEmpresa = $CargoEmpresa;
    }

    function setSueldoActual($SueldoActual) {
        $this->SueldoActual = $SueldoActual;
    }

    function setTipoContr($tipoContr) {
        $this->tipoContr = $tipoContr;
    }

    function setFechVincEmpr($fechVincEmpr) {
        $this->fechVincEmpr = $fechVincEmpr;
    }

    function setRecursPublc($RecursPublc) {
        $this->RecursPublc = $RecursPublc;
    }

    function setObsRecuPubl($ObsRecuPubl) {
        $this->ObsRecuPubl = $ObsRecuPubl;
    }

    function setVincRecursPublc($VincRecursPublc) {
        $this->VincRecursPublc = $VincRecursPublc;
    }

    function setDeclaraRenta($DeclaraRenta) {
        $this->DeclaraRenta = $DeclaraRenta;
    }

    function setSocioEmpre($SocioEmpre) {
        $this->SocioEmpre = $SocioEmpre;
    }

    function setPorceSoci($PorceSoci) {
        $this->PorceSoci = $PorceSoci;
    }

    function setRegiTribu($RegiTribu) {
        $this->RegiTribu = $RegiTribu;
    }

    function setMonedaextra($Monedaextra) {
        $this->Monedaextra = $Monedaextra;
    }

    function setTipoOpeExtra($TipoOpeExtra) {
        $this->TipoOpeExtra = $TipoOpeExtra;
    }

    function setOtraOperExtra($OtraOperExtra) {
        $this->OtraOperExtra = $OtraOperExtra;
    }

    function setIngreFijo($IngreFijo) {
        $this->IngreFijo = $IngreFijo;
    }

    function setIngreVari($IngreVari) {
        $this->IngreVari = $IngreVari;
    }

    function setOtroIngre1($otroIngre1) {
        $this->otroIngre1 = $otroIngre1;
    }

    function setOtroIngre2($otroIngre2) {
        $this->otroIngre2 = $otroIngre2;
    }

    function setHipoteca($Hipoteca) {
        $this->Hipoteca = $Hipoteca;
    }

    function setEgreCredi($EgreCredi) {
        $this->EgreCredi = $EgreCredi;
    }

    function setGastoFami($gastoFami) {
        $this->gastoFami = $gastoFami;
    }

    function setOtroEngre($otroEngre) {
        $this->otroEngre = $otroEngre;
    }

    function setTotalEgr($TotalEgr) {
        $this->TotalEgr = $TotalEgr;
    }

    function setVivienda($Vivienda) {
        $this->Vivienda = $Vivienda;
    }

    function setVehiculos($Vehiculos) {
        $this->Vehiculos = $Vehiculos;
    }

    function setInver($Inver) {
        $this->Inver = $Inver;
    }

    function setOtroAct($otroAct) {
        $this->otroAct = $otroAct;
    }

    function setTotalAct($TotalAct) {
        $this->TotalAct = $TotalAct;
    }

    function setPasHipo($PasHipo) {
        $this->PasHipo = $PasHipo;
    }

    function setPasTc($PasTc) {
        $this->PasTc = $PasTc;
    }

    function setOtrObli($otrObli) {
        $this->otrObli = $otrObli;
    }

    function setOtroPas($otroPas) {
        $this->otroPas = $otroPas;
    }

    function setTotalPas($TotalPas) {
        $this->TotalPas = $TotalPas;
    }

    function getTipoIdentificacion() {
        return $this->tipoIdentificacion;
    }

    function getIdentificacion() {
        return $this->identificacion;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getFechaExpeMan() {
        return $this->fechaExpeMan;
    }

    function getPaisExped() {
        return $this->paisExped;
    }

    function getDeptoExped() {
        return $this->deptoExped;
    }

    function getCiudadExped() {
        return $this->ciudadExped;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getGenero() {
        return $this->genero;
    }

    function getPaisNaci() {
        return $this->paisNaci;
    }

    function getDeptoNaci() {
        return $this->deptoNaci;
    }

    function getCiudadNaci() {
        return $this->ciudadNaci;
    }

    function getNacionalidad() {
        return $this->nacionalidad;
    }

    function getSinoNaciona() {
        return $this->sinoNaciona;
    }

    function getObservNaciona() {
        return $this->observNaciona;
    }

    function getSinoReside() {
        return $this->sinoReside;
    }

    function getObservReside() {
        return $this->observReside;
    }

    function getNivelEduca() {
        return $this->nivelEduca;
    }

    function getObservNivelEdu() {
        return $this->observNivelEdu;
    }

    function getTipoVivien() {
        return $this->tipoVivien;
    }

    function getObservTipoVivind() {
        return $this->observTipoVivind;
    }

    function getCiudadReside() {
        return $this->ciudadReside;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getDireccionClie() {
        return $this->direccionClie;
    }

    function getTelFijo() {
        return $this->telFijo;
    }

    function getCelularClie() {
        return $this->celularClie;
    }

    function getEmail() {
        return $this->email;
    }

    function setTipoIdentificacion($tipoIdentificacion) {
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setFechaExpeMan($fechaExpeMan) {
        $this->fechaExpeMan = $fechaExpeMan;
    }

    function setPaisExped($paisExped) {
        $this->paisExped = $paisExped;
    }

    function setDeptoExped($deptoExped) {
        $this->deptoExped = $deptoExped;
    }

    function setCiudadExped($ciudadExped) {
        $this->ciudadExped = $ciudadExped;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setPaisNaci($paisNaci) {
        $this->paisNaci = $paisNaci;
    }

    function setDeptoNaci($deptoNaci) {
        $this->deptoNaci = $deptoNaci;
    }

    function setCiudadNaci($ciudadNaci) {
        $this->ciudadNaci = $ciudadNaci;
    }

    function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    function setSinoNaciona($sinoNaciona) {
        $this->sinoNaciona = $sinoNaciona;
    }

    function setObservNaciona($observNaciona) {
        $this->observNaciona = $observNaciona;
    }

    function setSinoReside($sinoReside) {
        $this->sinoReside = $sinoReside;
    }

    function setObservReside($observReside) {
        $this->observReside = $observReside;
    }

    function setNivelEduca($nivelEduca) {
        $this->nivelEduca = $nivelEduca;
    }

    function setObservNivelEdu($observNivelEdu) {
        $this->observNivelEdu = $observNivelEdu;
    }

    function setTipoVivien($tipoVivien) {
        $this->tipoVivien = $tipoVivien;
    }

    function setObservTipoVivind($observTipoVivind) {
        $this->observTipoVivind = $observTipoVivind;
    }

    function setCiudadReside($ciudadReside) {
        $this->ciudadResidencia = $ciudadReside;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setDireccionClie($direccionClie) {
        $this->direccionClie = $direccionClie;
    }

    function setTelFijo($telFijo) {
        $this->telFijo = $telFijo;
    }

    function setCelularClie($celularClie) {
        $this->celularClie = $celularClie;
    }

    function setEmail($email) {
        $this->email = $email;
    }

        
 /* REALIZA UNA CONSULTA A LA BASE DE DATOS EN BUSCA DE REGISTROS UNIVERSITARIOS DADOS COMO
 PARAMETROS LA "CARRERA" Y LA "CANTIDAD" DE REGISTROS A MOSTRAR
 INPUT:
 $carrera | nombre de la carrera a buscar
 $limit | cantidad de registros a mostrar
 OUTPUT:
 $data | Array con los registros obtenidos, si no existen datos, su valor es una cadena vacia
 */
 function clientes( $tipoIden=NULL , $Ident=NULL, $nombre=NULL)
 {
    //conexion a la base de datos
    $this->conectar();
    $consulta = "SELECT ti.tipoIdentificacion as idTipoIdentificacion, ti.identificacion as TipoIdentificacion, c.identificacion, c.nombres,c.apellidos,c.Fec_Nacimiento_cte  "
            . "FROM cliente c,tipoidentificacion ti  where c.tipoIdentificacion = ti.tipoIdentificacion ";
    /**$consulta = "SELECT ti.tipoIdentificacion as idTipoIdentificacion, ti.identificacion as TipoIdentificacion, c.identificacion, c.nombres,"
              . "c.apellidos, c.telefono, c.correo, c.fechaNacimiento, c.direccion "
              . " FROM cliente c,tipoidentificacion ti "
              . " where c.tipoIdentificacion = ti.tipoIdentificacion ";**/
    
    if( $tipoIden != null && $tipoIden != '' && $tipoIden != '0' ){
        $consulta .= " AND c.tipoIdentificacion = '" . $tipoIden ."'";
    }
    if( $Ident != null && $Ident != '' ){
        $consulta .= " AND c.identificacion = '" . $Ident ."'" ;
    }
    if( $nombre != null && $nombre != '' ){
        $consulta .= " AND c.nombres like '%" . $nombre ."%'";
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
 
 function listaEstadoCivil()
 {
  //conexion a la base de datos
  $this->conectar();
  $query = $this->consulta("SELECT * FROM estado_civil;");
      $this->disconnect();
  if($this->numero_de_filas($query) > 0) // existe -> datos correctos
  {
    return $query;
  }else
  {
   return '';
  }
 }
 
 function tiposIdentificacion()
 {
  //conexion a la base de datos
  $this->conectar();
  $query = $this->consulta("SELECT t.TipoIdentificacion as TipoIdentificacion, t.identificacion as Identificacion FROM tipoidentificacion t;");
      $this->disconnect();
  if($this->numero_de_filas($query) > 0) // existe -> datos correctos
  {
    return $query;
  }else
  {
   return '';
  }
 }
 
 function insertarCliente(){
    $this->conectar();
    $query = "INSERT INTO cliente VALUES "
            . "( '" . $this->identificacion . "',"
            . "'" . $this->tipoIdentificacion . "',"
            . "'" . $this->nombres . "',"
            . "'" . $this->apellidos . "',"
            . "'" . $this->estadoCivil . "',"
            . "'" . $this->fechaNacimiento . "',"
            . "'" . $this->genero . "',"
            . "'" . $this->nivelEduca . "'"
            . ")" ;
    $save = $this->consulta( $query );
    
    $queryUser = "INSERT INTO usuario values "
            . "( '" . $this->tipoIdentificacion . "',"
            . "'" . $this->identificacion . "',"
            . "'" . md5($this->identificacion) . "',"
            . "'" . $this->nombres . "',"
            . "'3',"
            . "'" . $this->apellidos . "',"
            . "'0','1'"
            . ")" ;
    
    $save2 = $this->consulta( $queryUser );
    
    $this->disconnect();
    return $save;
     
 }
}


