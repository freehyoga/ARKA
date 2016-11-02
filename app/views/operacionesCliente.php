<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        $opcion = $_POST['opcion'];
        
        // OPCION PARA OBTENER MANDATOS
        if( $opcion == 1 ){
            $tipoIdent  = $_POST['tipoIdentifica'];    
            $identifica = $_POST['identifica'];    

            $mvc = new mvc_controller();
            $select = $mvc->getLibranzasXCliente($tipoIdent, $identifica);

            if( $select != ''){
                foreach( $select as $fila ){
                    $output[] = array (  
                                        $fila['idLibranza'], 
                                        $fila['Tipo_Iden_Deud'],
                                        $fila['Nume_Iden_Deud'],
                                        $fila['Nombre_Deud_Libra'], 
                                        $fila['Vlr_Cuot_Libra_format'], 
                                        $fila['Nro_Cuot_Libra'], 
                                        $fila['Vlr_Fin_Libra_format'], 
                                        $fila['Proveedor_Identificacion'],
                                        '<div align="center"></div>'        
                                      );
                }
            }else{
                $output[] = '';
                //header("location:../../index.php");
            }
            echo json_encode($output); 
        }
    
    }
