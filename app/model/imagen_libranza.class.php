<?php
/*
 CLASE PARA LA GESTION DE LOS CLIENTES
*/
require_once "db.class.php";

class imagen_libranza extends database {

    private $id_libranza;
    private $anchura;
    private $altura;
    private $imagen;
    private $tipo;
    
    public function getId_Libranza() {
        return $this->$id_libranza;
    }
 
    public function setId_Libranza($idLibranza) {
        $this->id_libranza = $idLibranza;
    }
    
    public function getAnchura() {
        return $this->anchura;
    }
 
    public function setAnchura($anchura) {
        $this->anchura = $anchura;
    }
    
    public function getAltura() {
        return $this->altura;
    }
 
    public function setAltura($altura) {
        $this->altura = $altura;
    }
    
    public function getImagen() {
        return $this->imagen;
    }
 
    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    
    public function getTipo() {
        return $this->tipo;
    }
 
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    
    
    function insertarImagenLibranza(){
        $this->conectar();
        
        # Escapa caracteres especiales
        $imagenEscapes = $this->escapeCaracteres( $this->imagen );
 
        //# Escapa caracteres especiales
        //$imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
        
        $queryUser = "INSERT INTO lsc_imagen_libranza values "
                . "( '1',"
                . "'" . $this->id_libranza . "',"
                . "'" . $this->anchura . "',"
                . "'" . $this->altura . "',"
                . "'" . $this->tipo . "',"
                . "'" . $imagenEscapes . "'"
                . ")" ;

        $save = $this->insercion( $queryUser );

        $this->disconnect();
        return $save;  
    }
}