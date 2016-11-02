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


