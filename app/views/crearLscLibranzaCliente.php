<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        
        try{
            //$temp=$_POST['tipoIdentifica'] . '*' .$_POST['numIdentifica'] . '*' . $_POST['nombre'] . $_POST['cedula'] ;      
            $IdLibranza = $_POST['IdLibranza'];

            $mvc = new mvc_controller();

            // Verificar si la lsc_libranza ya existe en la base de datos
            $select1 = $mvc->getLscLibranza( $IdLibranza);

            if( $select1 != ''){  
                $output[] = array ( "La libranza ya existe." );

            }else{
                $idLibranza = $_POST['IdLibranza'];
                $TipoIdenProv = $_POST['TipoIdenProv'];
                $IdenProv  = $_POST['IdenProv'];
                $NomDeuLib = $_POST['NomDeuLib'];
                $TipoIdenDeud = $_POST['TipoIdenDeud'];
                $IdenDeud =  $_POST['IdenDeud'];
                $VlrCuotLibr  =  $_POST['VlrCuotLibr'];
                $NumCuoLib = $_POST['NumCuoLib'];
                $VlrLibranza  = $_POST['VlrLibranza'];

                $mvc->InsertarLscLibranza( 
                            $idLibranza,
                            $TipoIdenProv,
                            $IdenProv,
                            $NomDeuLib,
                            $TipoIdenDeud,
                            $IdenDeud,
                            $VlrCuotLibr,
                            $NumCuoLib,
                            $VlrLibranza
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
