<?php

require_once "db.class.php";

/**
 * Description of usuario
 *
 * @author Edward1
 */
class usuario extends database{
    
    private $tipoIdentificacion;
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $password;
    private $perfil;
    
    public function getPassword() {
        return $this->password;
    }
 
    public function setPassword($pass) {
        $this->password = $pass;
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
    
    public function getPerfil() {
        return $this->perfil;
    }
 
    public function setperfil($perfil) {
        $this->perfil = $perfil;
    }
    
    function getPerfiles()
    {
        //conexion a la base de datos
        $this->conectar();
        $query = $this->consulta("SELECT * FROM perfil;");
            $this->disconnect();
        if($this->numero_de_filas($query) > 0) // existe -> datos correctos
        {
          return $query;
        }else
        {
         return '';
        }
    }
    
    
    function getInfoUsuario( $tipoIden=NULL , $Ident=NULL)
    {
       //conexion a la base de datos
       $this->conectar();
       $consulta = "SELECT * FROM usuario where 1=1  ";

       if( $tipoIden != null && $tipoIden != '' && $tipoIden != '0' ){
           $consulta .= " AND TipoIdentificacion = '" . $tipoIden ."'";
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
    
    function insertarUsuario(){
        $this->conectar();

        $queryUser = "INSERT INTO usuario values "
                . "( '" . $this->tipoIdentificacion . "',"
                . "'" . $this->identificacion . "',"
                . "'" . md5($this->password) . "',"
                . "'" . $this->nombres . "',"
                . "'" . $this->perfil . "',"
                . "'" . $this->apellidos . "',"
                . "'0','0'"
                . ")" ;

        $save = $this->consulta( $queryUser );

        $this->disconnect();
        return $save;  
    }
    
}
