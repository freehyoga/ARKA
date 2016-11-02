<?php
    session_start();
    require '../controller/mvc_lsc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        $opcion = $_POST['opcion'];
        
        // OPCION PARA OBTENER LIBRANZAS
        if( $opcion == 1 ){
            $tipoIdent  = $_POST['tipoIdentifica'];    
            $identifica = $_POST['identifica'];    

            $mvc = new mvc_lsc_controller();
            $select = $mvc->getLibranzasXCliente($tipoIdent, $identifica);

            if( $select != ''){
                foreach( $select as $fila ){
                    $output[] = array (  
                                        $fila['idLibranza'], 
                                        $fila['Tipo_Iden_Deud'],
                                        $fila['Nume_Iden_Deud'],
                                        $fila['Nombre_Deud_Libra'], 
                                        $fila['Vlr_Cuot_Libra'], 
                                        $fila['Nro_Cuot_Libra'], 
                                        $fila['Vlr_Fin_Libra'],
                                        '<div align="center"><img onclick="edicionLibranza(\''.$fila['idLibranza'].'\')" src="imagenes/update.ico" alt="editar libranza" style="width:30px;height:24px;"></div>'        
                                      );
                }
            }else{
                $output = null;
                //header("location:../../index.php");
            }
            echo json_encode($output);
        }
        
        
    }
 