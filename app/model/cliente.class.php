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
    private $direccion;
    private $fechaNacimiento;
    private $celular;
    private $genero;
    private $nivelEduca;
    private $nacionalidad;
    private $estadoCivil;
    private $ciudadResidencia;
    private $telFijo;
    private $email;

    private $fechaExpeMan;
    private $paisExped ;
    private $deptoExped;
    private $ciudadExped ;
    private $paisNaci;
    private $deptoNaci;
    private $ciudadNaci;
    private $sinoNaciona;
    private $observNaciona;
    private $sinoReside;
    private $observReside;
    private $observNivelEdu ;
    private $tipoVivien;
    private $observTipoVivind; 	
    private $direccionClie  ;	
    private $celularClie;	
    
    
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

    function getPaisNaci() {
        return $this->paisNaci;
    }

    function getDeptoNaci() {
        return $this->deptoNaci;
    }

    function getCiudadNaci() {
        return $this->ciudadNaci;
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

    function getObservNivelEdu() {
        return $this->observNivelEdu;
    }

    function getTipoVivien() {
        return $this->tipoVivien;
    }

    function getObservTipoVivind() {
        return $this->observTipoVivind;
    }

    function getDireccionClie() {
        return $this->direccionClie;
    }

    function getCelularClie() {
        return $this->celularClie;
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

    function setPaisNaci($paisNaci) {
        $this->paisNaci = $paisNaci;
    }

    function setDeptoNaci($deptoNaci) {
        $this->deptoNaci = $deptoNaci;
    }

    function setCiudadNaci($ciudadNaci) {
        $this->ciudadNaci = $ciudadNaci;
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

    function setObservNivelEdu($observNivelEdu) {
        $this->observNivelEdu = $observNivelEdu;
    }

    function setTipoVivien($tipoVivien) {
        $this->tipoVivien = $tipoVivien;
    }

    function setObservTipoVivind($observTipoVivind) {
        $this->observTipoVivind = $observTipoVivind;
    }

    function setDireccionClie($direccionClie) {
        $this->direccionClie = $direccionClie;
    }

    function setCelularClie($celularClie) {
        $this->celularClie = $celularClie;
    }    
    
    function getNivelEduca() {
        return $this->nivelEduca;
    }

    function setNivelEduca($nivelEduca) {
        $this->nivelEduca = $nivelEduca;
    }

        public function getCiudadResidencia() {
        return $this->ciudadResidencia;
    }
 
    public function setCiudadResidencia($ciudadResidencia) {
        $this->ciudadResidencia = $ciudadResidencia;
    }
    
    public function getTelFijo() {
        return $this->telFijo;
    }
 
    public function setTelFijo($telFijo) {
        $this->telFijo = $telFijo;
    }
    
    public function getEstadoCivil() {
        return $this->estadoCivil;
    }
 
    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }
    
    public function getNacionalidad() {
        return $this->nacionalidad;
    }
 
    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }
    
    public function getGenero() {
        return $this->genero;
    }
 
    public function setGenero($genero) {
        $this->genero = $genero;
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
    public function getNombres() {
        return $this->nombres;
    }
 
    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }
    
    public function getApellidos() {
        return $this->apellidos;
    }
 
    public function setApellidos($apellidos) {
        $this->apellidos= $apellidos;
    }
    
    public function getDireccion() {
        return $this->direccion;
    }
 
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }
 
    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }
    
    public function getCelular() {
        return $this->direccion;
    }
 
    public function setCelular($celular) {
        $this->celular = $celular;
    }
    
    public function getEmail() {
        return $this->email;
    }
 
    public function setEmail($email) {
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
    $consulta = "SELECT ti.tipoIdentificacion as idTipoIdentificacion, ti.identificacion as TipoIdentificacion, c.identificacion, c.nombres,"
              . "c.apellidos, c.telefono, c.correo, c.fechaNacimiento, c.direccion "
              . " FROM cliente c,tipoidentificacion ti "
              . " where c.tipoIdentificacion = ti.tipoIdentificacion ";
    
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
            . "'" . $this->fechaNacimiento . "',"
            . "'" . $this->genero . "',"
            . "'" . $this->nivelEduca . "',"
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


