<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        $opcion = $_POST['opcion'];
        
        
        /** CREAR USUARIO **/
        if( $opcion == 1 ){
            $tipoIdent = $_POST['tipoIdentifica'];
            $ident     = $_POST['numIdentifica'];
            $nombre = "";

            $mvc = new mvc_controller();

            // Verificar si el usuario ya existe en la base de datos
            $select1 = $mvc->getInfoUsuario( $tipoIdent,  $ident);

            if( $select1 != ''){  
                $output[] = array ( "El usuario ya existe." );
            }else{
                $nombre    = $_POST['nombresUsua'];
                $apellidos = $_POST['apellidosUsua'];
                $perfil    = $_POST['perfil'];
                $password  = $_POST['password'];
                
                $mvc->InsertarUsuario( 
                            $tipoIdent,
                            $ident,
                            $nombre,
                            $apellidos,
                            $password,
                            $perfil
                        );

                $output[] = '';
                
                
            }
            echo json_encode($output);
        }
    }