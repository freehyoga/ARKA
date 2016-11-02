<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        
        try{
            //$temp=$_POST['tipoIdentifica'] . '*' .$_POST['numIdentifica'] . '*' . $_POST['nombre'] . $_POST['cedula'] ;      
        $tipoIdent = $_POST['tipoIDCoop'];
        $ident     = $_POST['numeIdenProv'];
        
        
        $mvc = new mvc_controller();
             
        // Verificar si el cliente ya existe en la base de datos
        $select1 = $mvc->getCooperativa( $tipoIdent,  $ident);

        if( $select1 != ''){  
            $output[] = array ( "La cooperativa ya existe." );
            
        }else{
                    
            $siglaCoop = $_POST['siglaCoop'];
            $raznSoclCoop = $_POST['raznSoclCoop'];
            $DirCoop = $_POST['DirCoop'];
            $paginaCoop = $_POST['paginaCoop'];
            $telCoop = $_POST['telCoop'];
            $NomReprLCoop = $_POST['NomReprLCoop'];
            $tipoIdRepre = $_POST['tipoIdRepre'];
            $numeIdenRepre = $_POST['numeIdenRepre'];
            $celRepreCoop =$_POST['celRepreCoop'];
            $mailReprCoop =$_POST['mailReprCoop'];
        
            $mvc->InsertarCoop(
                        $tipoIdent,
                        $ident,
                        $siglaCoop,
                        $raznSoclCoop,
                        $DirCoop,
                        $paginaCoop,
                        $telCoop,
                        $NomReprLCoop,
                        $tipoIdRepre, 
                        $numeIdenRepre, 
                        $celRepreCoop,
                        $mailReprCoop
                    );
            
            $output[] = '';
        }  
                        
        //header("location:../../index.php");

        echo json_encode($output);
        }catch(Exception $ex){
            $output[] = array ( $ex->getMessage() ,"error");
            echo json_encode($output );
        }
  
    }
