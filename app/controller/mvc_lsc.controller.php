<?php

require '../model/imagen_libranza.class.php';
require '../model/lsc_libranza.class.php';

class mvc_lsc_controller {

 function insertarImagenLibranza( $anchura = NULL, $altura = NULL, $tipo = NULL, $imagen = NULL, $idLibranza = NULL )
{
    $imagen_libranza = new imagen_libranza();
    
    $imagen_libranza->setAltura( $altura );
    $imagen_libranza->setAnchura( $anchura );
    $imagen_libranza->setImagen( $imagen );
    $imagen_libranza->setTipo( $tipo );
    $imagen_libranza->setId_Libranza( $idLibranza );    
            
    return $imagen_libranza->insertarImagenLibranza();
                      
}

function getLibranzasXCliente( $tipoIdent, $ident)
{
         $libranza = new lsc_libranza();
         //carga la plantilla 

         //realiza consulta al modelo
          return $libranza->libranzasXCliente( $tipoIdent, $ident );
}

 
}

