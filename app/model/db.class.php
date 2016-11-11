<?php
/**
 * CLASE PARA LA CONEXION A LA BASE DE DATOS
 */

class database {

 private $conexion;

 
    /* METODO PARA CONECTAR CON LA BASE DE DATOS*/
 public function conectar()
 {
  if(!isset($this->conexion))
  {
    $this->conexion = new mysqli("localhost","arkactiv_db_ark","ark2016","arkactiv_sistema_ark");
    
    if( $this->conexion->connect_errno ){
        echo "Falla conectando hacia la base de datos";
        echo "Error: " . $this->conexion->connect_error . "\n";
    
        // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
        exit;
        
    }
  }
 } 

  /* METODO PARA REALIZAR UNA CONSULTA 
 INPUT:
 $sql | codigo sql para ejecutar la consulta
 OUTPUT: $result
 */
 public function consulta($sql)
 {
     
    $resultado = $this->conexion->query($sql);
    if(!$resultado){
     echo "Error: " . $this->conexion->connect_error . "\n";
     $this->conexion->rollback();
     exit;
    }
    return $resultado;
 }
 
 /***
  * 
  * Metodo para deshabilitar el autocommit
  * freehyoga
  * 08/11/2016
  * 
  */
 public function autocommit(){
    $resultado = $this->conexion->autocommit(false);
    if(!$resultado){
        echo "Error: " . $this->conexion->connect_error . "\n";
        exit;
    }
    return $resultado;
 }
 
 /***
  * 
  * Metodo para realizar  el commit
  * freehyoga
  * 08/11/2016
  * 
  */
 public function commit(){
    $resultado = $this->conexion->commit();
    if(!$resultado){
        echo "Error: " . $this->conexion->connect_error . "\n";
        exit;
    }
    return $resultado;
 }
  /***
  * 
  * Metodo para realizar  el commit
  * freehyoga
  * 08/11/2016
  * 
  */
 public function rollback(){
    $resultado = $this->conexion->rollback();
    if(!$resultado){
        echo "Error: " . $this->conexion->connect_error . "\n";
        exit;
    }
    return $resultado;
 }

 /*METODO PARA CONTAR EL NUMERO DE RESULTADOS
 INPUT: $result
 OUTPUT: cantidad de registros encontrados
 */
 function numero_de_filas($result){
  if ($result->num_rows === 0) {
    return 0;
    }
  return $result->num_rows;
 }

 /*METODO PARA CREAR ARRAY DESDE UNA CONSULTA
 INPUT: $result
 OUTPUT: array con los resultados de una consulta
 */
 function fetch_assoc($result){
  if(!is_resource($result)) return false;
   return $result->fetch_assoc();
 }

     /* METODO PARA CERRAR LA CONEXION A LA BASE DE DATOS */
 public function disconnect()
 {
    $this->conexion->close();
 }
 
 public function insercion($sql)
 {
    $resultado = $this->conexion->query($sql);
    if(!$resultado){
     echo "Error: " . $this->conexion->connect_error . "\n";
     exit;
    }
    return $this->conexion->insert_id;
 }
 
 public function escapeCaracteres( $imagen ){
     # Escapa caracteres especiales
    return $this->conexion->real_escape_string(file_get_contents( $imagen ));
 }

}
?>