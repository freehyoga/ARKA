<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        
        $opcion = $_POST['opcion'];
        
        // OPCION PARA OBTENER MANDATOS
        if( $opcion == 1 ){
            $tipoIdent      = $_POST['tipoIdentifica'];
            $tipoIdentifica = $_POST['identifica'];           

            $mvc = new mvc_controller();
            $select = $mvc->getMandatos( $tipoIdent,  $tipoIdentifica );

            if( $select != ''){
                /**foreach( $select as $fila ){
                    $output[] = array (       
                        '<div align="center"><a href="javascript:verLibranzas(\''. $fila['id_mandato'] .'\');">'. $fila['id_mandato'] .'</a><img onclick="javascript:verLibranzas(\''. $fila['id_mandato'] .'\');" src="imagenes/search.ico" alt="ver libranzas" style="width:30px;height:30px;"></div>',
                        $fila['nombre'], 
                        $fila['vlr_mandato'],
                        $fila['fecha_creacion']
                    );**/
                    foreach( $select as $fila ){
                        $output[] = array ( 
                                $fila['id_mandato']
                            );
                    }
            }else{
                $output[] = '';
                //header("location:../../index.php");
            }
            echo json_encode($output);  
        }
        
        // OPCION PARA OBTENER LIBRANZAS
         if( $opcion == 2 ){
            $mandato = $_POST['mandato'];           

            $mvc = new mvc_controller();
            $select = $mvc->getLibranzasXMandato( $mandato );

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
                                        '<div align="center"><img onclick="desasociarLibranza(\''.$fila['idLibranza'].'\',\''.$mandato.'\',\''.$fila['Proveedor_Identificacion'].'\')" src="imagenes/mandatos.ico" alt="Desasociar Libranza" style="width:30px;height:30px;"></div>'        
                                      );
                }
            }else{
                $output[] = '';
                //header("location:../../index.php");
            }
            echo json_encode($output); 
         }
         
        // OPCION PARA CREAR MANDATO 
         if( $opcion == 3 ){
            try{                
                             
                
                $mvc = new mvc_controller();
                $tipoIdent    = "";
                $ident        = ""; 
                //Traer el ultimo numero de mandato
                $select1 = $mvc->getMandatos( $tipoIdent,  $ident);
                
            if( $select1 == '' || $select1 == null ){
                $output[] = array ( "No existen Mandatos." );
            }
            else{
                foreach( $select1 as $fila ){
                        $id_mandato   = $fila['id_mandato'];       
                }
                $tipoIdent    = $_POST['tipoIdentifica'];
                $ident        = $_POST['identifica'];  
                $TipoMandt    = $_POST['TipoMandt'];
                $porcDescAdmi = $_POST['porcDescAdmi'];
                $porcDescAdmi = str_replace(".", "", $porcDescAdmi);
                $valrCons     = $_POST['valrCons'];
                $valrCons     = str_replace(".", "", $valrCons);
                $porcDescCorre= $_POST['porcDescCorre'];
                $porcDescCorre= str_replace(".", "", $porcDescCorre);
                
                $select1 = $mvc->InsertarMandato(
                                        $id_mandato,
                                        $TipoMandt,
                                        $tipoIdent,
                                        $ident,
                                        $porcDescAdmi, 
                                        $valrCons, 
                                        $porcDescCorre );

                $output[] = array(
                            $fila ['id_mandato'],
                            $fila ['ident']);

                echo json_encode($output);
                
            }
                
            }catch(Exception $ex){
                $output[] = array ( $ex->getMessage() ,"error");
                echo json_encode($output );
            }
         }
         
        // OPCION PARA LISTAR LIBRANZAS A ASOCIAR 
        if( $opcion == 4){
             try{                
                $mvc = new mvc_controller();
                $select = $mvc->getLibranzasAsociar( );

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
                                            $fila['Proveedor_Identificacion']
                                          );
                    }
                }else{
                    $output[] = '';
                    //header("location:../../index.php");
                }
                echo json_encode($output);
            }catch(Exception $ex){
                $output[] = array ( $ex->getMessage() ,"error");
                echo json_encode($output );
            }
             
             
        }
        
        // OPCION PARA ACTUALIZAR LAS LIBRANZAS SELECCIONADAS
        if( $opcion == 5){
            try{
                $mvc = new mvc_controller();
                
                $mandato = $_POST['mandato'];               
                $data = explode('&',$_POST['libranzas']);
                
                for($counter = 0; $counter < count($data); $counter = $counter + 3)
                {
                    list($key, $value) = explode('=',$data[ $counter ] );
                    $libr = $value;
                    list($key, $value) = explode('=',$data[ $counter+1 ] );
                    $tipoidCooper = $value;
                    list($key, $value) = explode('=',$data[ $counter+2 ] );
                    $coop = $value;
                    
                    $mvc->asociarLibranza($mandato, $libr,$tipoidCooper, $coop);

                    $output[] = array ( $libr );
                }
                echo json_encode($output);
            
            }catch(Exception $ex){
                $output[] = array ( $ex->getMessage() ,"error");
                echo json_encode($output );
            }  
        }
    
        if( $opcion == 6){
            try{
                $mvc = new mvc_controller();
                
                $mandato   = $_POST['mandato'];    
                $libranza  = $_POST['libranza']; 
                $proveedor = $_POST['proveedor']; 
                
                $select = $mvc->desAsociarLibranza($mandato, $libranza, $proveedor);
                
                if( $select != ''){
                    $output = [$select];
                }else{
                    $output[] = '';
                }
                echo json_encode($output);
            
            }catch(Exception $ex){
                $output[] = array ( $ex->getMessage() ,"error");
                echo json_encode($output );
            }  
        }
        
        // CONSULTAR INFORMACION MANDATO
        if( $opcion == 7){
            try{
                
                $mvc = new mvc_controller();                
                $idMandato   = $_POST['mandato'];    
                
                $select = $mvc->getInfoMandato( $idMandato );
                
                if( $select != ''){
                    foreach( $select as $fila ){
                        $output[] = array (  
                                            $fila['id_mandato'], 
                                            $fila['esta_mandato']
                                          );
                    }
                }else{
                    $output[] = '';
                }
                echo json_encode($output);
            
            }catch(Exception $ex){
                $output[] = array ( $ex->getMessage() ,"error");
                echo json_encode($output );
            }  
        }
        //Consultar si el cliente existe para crear el mandato
        if($opcion ==8){
            
            try {
                   
                $tipoIdent = $_POST['tipoIdentifica'];
                $ident     = $_POST['identifica'];
                $nombre    = "";
                
                $mvc = new mvc_controller();

                // Verificar si el cliente ya existe en la base de datos
                $select1 = $mvc->getClientes( $tipoIdent,  $ident , $nombre);
                
                
                if( $select1 != ''){  
                     
                    foreach( $select1 as $fila ){
                        $output[] = array (  
                                            $fila['identificacion'], 
                                            $fila['TipoIdentificacion']
                                    );    
                    }
                }else{
                    $output[] = array(
                        $fila[01],
                        $fila['mal'],
                    );
                }
                echo json_encode($output);
            } catch (Exception $ex) {
                $output[] = null;// array ( $ex->getMessage() ,"error");
                echo json_encode($output );
            }
        }
        
    }