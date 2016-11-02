<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( isset($_POST['cerrar_s']) ){
        session_destroy();
        header("location:../../index.php");
    }
?>