<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        
        $opcion = $_POST['opcion'];
        
        if( $opcion == 1 ){
            try{
            //$temp=$_POST['tipoIdentifica'] . '*' .$_POST['numIdentifica'] . '*' . $_POST['nombre'] . $_POST['cedula'] ;      
            $tipoIdent = $_POST['tipoIdentifica'];
            $ident     = $_POST['numIdentifica'];
            $nombre = "";

            $mvc = new mvc_controller();

            // Verificar si el cliente ya existe en la base de datos
            $select1 = $mvc->getClientes( $tipoIdent,  $ident , $nombre);

            if( $select1 != ''){  
                $output[] = array ( "El cliente ya existe." );

            }else{
                $nombre    = $_POST['nombresClie'];
                $apellidos = $_POST['apellidosClie'];
                $telefono  = $_POST['celularClie'];
                $direccion = $_POST['direccionClie'];
                $fechaNacimiento = $_POST['fechaNacClie'];
                $celular =  $_POST['celularClie'];
                $email  =  $_POST['emailClie'];

                $nacionalidad = $_POST['nacionalidad'];
                $genero       = $_POST['genero'];
                $estadoCivil  = $_POST['estadoCivil'];
                $ciudadResid  = $_POST['ciudadResid'];
                $telefonoFijo = $_POST['telefonoFijo'];
                

                $mvc->InsertarCliente( 
                            $tipoIdent,
                            $ident,
                            $nombre,
                            $apellidos,
                            $telefono,
                            $direccion,
                            $fechaNacimiento,
                            $celular,
                            $email,
                            $nacionalidad,
                            $genero,
                            $ciudadResid,
                            $estadoCivil
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
        
        if( $opcion == 2 ){
            $mvc = new mvc_controller();
            $select = $mvc->getTiposIdentificacion();
            
            if( $select != ''){  
                if( $select != ''){
                    
                    foreach( $select as $fila ){
                        $output[] = array (  
                                        $fila['TipoIdentificacion'], 
                                        $fila['Identificacion']
                                    );
                    }
                    
                //    echo '<option value="0">Seleccione...</option>';
                /*    foreach( $select as $fila ){
                        echo '<option value=\''. $fila['TipoIdentificacion'] .'\'> ' . $fila['Identificacion'] . '</option>';
                    }
                }else{
                    echo '<option value="">Seleccione...</option>';
                }*/
                    
                }

            }else{
                $output[] = '';
            }
            echo json_encode($output);
        }
    }
