<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    //se instancia al controlador 
    $mvc = new mvc_controller();
    
    if( isset($_POST['InicioSesion'])){
        if( $_POST['user_id'] != "" && $_POST['password'] != "" ){
            $mvc = new mvc_controller();
            $user     = $_POST['user_id'];
            $password = $_POST['password'];
            // Encriptar passwod
            //$ENCI = shal($password);
            $mvc->loguear( $user, $password);
            
        }
        else{
            echo " Diligencia los campos [Usuario] y [Contrasena]";
        }
    }    
?>