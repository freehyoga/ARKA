<?php
/*
 CLASE PARA LA GESTION DE LOS CLIENTES
*/
require_once "db.class.php";

class login extends database {
   
 function loguear($usuario=NULL, $password=NULL)
 {
  //conexion a la base de datos
  $this->conectar();
  //$pass_encript = md5($password);
  $pass_encript = $password;
  $query = $this->consulta("SELECT * FROM usuario WHERE identificacion='$usuario' and password='$pass_encript';");
      $this->disconnect();
  return $query;
 }
 
 function cargarMenuUsuario( $perfil=NULL )
 {
  //conexion a la base de datos
  $this->conectar();
  $query2 = $this->consulta("SELECT m.nivel,m.nombreMenu, m.url from menu m, perfil_menu pm where pm.activo = 1 and m.id_Menu = pm.id_Menu and pm.Id_Perfil = '$perfil' order by pm.id_Menu;");
      $this->disconnect();
  return $query2;
 }
 
 function infoUsuario( $perfil=NULL,$tipoIdent=NULL, $ident=NULL  )
 {
  //conexion a la base de datos
  $this->conectar();
    
    if( $perfil == '1' ){
        $query3 = $this->consulta("select * FROM usuario where identificacion = '$ident' and TipoIdentificacion = '$tipoIdent';");
    }
    if( $perfil == '3' ){
        $query3 = $this->consulta("select c.*, u.primer_ingreso FROM cliente c, usuario u where c.identificacion = u.identificacion "
                . " AND c.TipoIdentificacion = u.TipoIdentificacion AND c.identificacion = '$ident' and c.TipoIdentificacion = '$tipoIdent';");
    }
    $this->disconnect();
    return $query3;
 }
 
 function recuperarContra($usuario=NULL)
    {
     //conexion a la base de datos
     $this->conectar();
     $query4 = $this->consulta("SELECT * FROM usuario WHERE identificacion='$usuario';");
     $this->disconnect();
     return $query4;
    }
    
    function actualizaContra($usuario=NULL, $password=NULL)
    {
        //Conexion a la base de datos.
       $this->conectar();
       $query5 = $this->consulta("UPDATE usuario SET password='$password', primer_ingreso='0' WHERE identificacion='$usuario';");
       $this->disconnect();
       return $query5;
    } 
 
}


