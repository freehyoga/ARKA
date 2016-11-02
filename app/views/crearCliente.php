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
                $fechaNacimiento = $_POST['fechaNacClie'];
                $fechaExpeMan  = $_POST['fechaExpeMan'];
                
                $paisExped  = $_POST['paisExped'];
                $deptoExped  = $_POST['deptoExped'];
                $ciudadExped  = $_POST['ciudadExped'];
                $genero       = $_POST['genero'];
                $paisNaci  = $_POST['paisNaci'];
                $deptoNaci  = $_POST['deptoNaci'];
                $ciudadNaci  = $_POST['ciudadNaci'];
                $nacionalidad = $_POST['nacionalidad'];
                $sinoNaciona  = $_POST['sinoNaciona'];
                $observNaciona  = $_POST['observNaciona'];
                $sinoReside = $_POST['sinoReside'];
                $observReside  = $_POST['observReside'];
                $estadoCivil  = $_POST['estadoCivil'];
                $nivelEduca = $_POST['nivelEduca'];
                $observNivelEdu = $_POST['observNivelEdu'];
                $tipoVivien = $_POST['tipoVivien'];
                $observTipoVivind = $_POST['observTipoVivind'];
                $ciudadReside = $_POST['ciudadReside'];
                $direccionClie = $_POST['direccionClie'];
                $telefonoFijo = $_POST['telefonoFijo'];
                $celular =  $_POST['celularClie'];
                $email  =  $_POST['emailClie'];
                
                $nombrsConyg = $_POST['nombrsConyg'];
                $apelldsConyg = $_POST['apelldsConyg'];
                $numIdentfcnConyg = $_POST['numIdentfcnConyg'];
                $tipoIdentfcnConyg = $_POST['tipoIdentfcnConyg'];
                $fijoConyg = $_POST['fijoConyg'];
                
                $ocupcn = $_POST['ocupcn'];
                $observOcupcn = $_POST['observOcupcn'];
                $tipoEmprs = $_POST['tipoEmprs'];
                $NitEmpre = $_POST['NitEmpre'];
                $Sector = $_POST['Sector'];
                $Empresa = $_POST['Empresa'];
                $TelEmpresa = $_POST['TelEmpresa'];
                $DirEmpresa = $_POST['DirEmpresa'];
                $CargoEmpresa = $_POST['CargoEmpresa'];
                $SueldoActual = $_POST['SueldoActual'];
                $tipoContr = $_POST['tipoContr'];
                $fechVincEmpr = $_POST['fechVincEmpr'];
                $RecursPublc = $_POST['RecursPublc'];
                $ObsRecuPubl = $_POST['ObsRecuPubl'];
                $VincRecursPublc = $_POST['VincRecursPublc'];
                $DeclaraRenta = $_POST['DeclaraRenta'];
                $SocioEmpre = $_POST['SocioEmpre'];
                $PorceSoci = $_POST['PorceSoci'];
                $RegiTribu = $_POST['RegiTribu'];
                
                
                $Monedaextra = $_POST['Monedaextra'];
                $TipoOpeExtra = $_POST['TipoOpeExtra'];
                $OtraOperExtra = $_POST['OtraOperExtra'];
                
                $IngreFijo = $_POST['IngreFijo'];
                $IngreVari = $_POST['IngreVari'];
                $otroIngre1 = $_POST['otroIngre1'];
                $otroIngre2 = $_POST['otroIngre2'];
                $Hipoteca = $_POST['Hipoteca'];
                $EgreCredi = $_POST['EgreCredi'];
                $gastoFami = $_POST['gastoFami'];
                $otroEngre = $_POST['otroEngre'];
                $TotalEgr = $_POST['TotalEgr'];
                $Vivienda = $_POST['Vivienda'];
                $Vehiculos = $_POST['Vehiculos'];
                $Inver = $_POST['Inver'];
                $otroAct = $_POST['otroAct'];
                $TotalAct = $_POST['TotalAct'];
                $PasHipo = $_POST['PasHipo'];
                $PasTc = $_POST['PasTc'];
                $otrObli = $_POST['otrObli'];
                $otroPas = $_POST['otroPas'];
                $TotalPas = $_POST['TotalPas'];
                     
                              

                $mvc->InsertarCliente( 
                            $tipoIdent,
                            $ident,
                            $nombre    ,               
                            $apellidos ,               
                            $fechaNacimiento ,                      
                            $fechaExpeMan  ,           

                            $paisExped  ,              
                            $deptoExped  ,             
                            $ciudadExped  ,            
                            $genero       ,            
                            $paisNaci  ,               
                            $deptoNaci  ,              
                            $ciudadNaci  ,             
                            $nacionalidad ,            
                            $sinoNaciona  ,            
                            $observNaciona  ,          
                            $sinoReside ,              
                            $observReside  ,           
                            $estadoCivil  ,            
                            $nivelEduca ,              
                            $observNivelEdu ,          
                            $tipoVivien ,              
                            $observTipoVivind ,        
                            $ciudadReside ,            
                            $direccionClie ,           
                            $telefonoFijo ,            
                            $celular ,                 
                            $email  ,                  

                            $nombrsConyg ,             
                            $apelldsConyg ,            
                            $numIdentfcnConyg ,        
                            $tipoIdentfcnConyg ,       
                            $fijoConyg ,               

                            $ocupcn ,                  
                            $observOcupcn ,            
                            $tipoEmprs ,               
                            $NitEmpre ,                
                            $Sector ,                  
                            $Empresa ,                 
                            $TelEmpresa ,              
                            $DirEmpresa ,              
                            $CargoEmpresa ,            
                            $SueldoActual ,            
                            $tipoContr ,               
                            $fechVincEmpr ,            
                            $RecursPublc ,             
                            $ObsRecuPubl ,             
                            $VincRecursPublc ,         
                            $DeclaraRenta ,            
                            $SocioEmpre ,              
                            $PorceSoci ,               
                            $RegiTribu ,               


                            $Monedaextra ,             
                            $TipoOpeExtra ,            
                            $OtraOperExtra ,           

                            $IngreFijo ,               
                            $IngreVari ,               
                            $otroIngre1 ,              
                            $otroIngre2 ,              
                            $Hipoteca ,                
                            $EgreCredi ,               
                            $gastoFami ,               
                            $otroEngre ,               
                            $TotalEgr ,                
                            $Vivienda ,                
                            $Vehiculos ,               
                            $Inver ,                   
                            $otroAct ,                 
                            $TotalAct ,                
                            $PasHipo ,                 
                            $PasTc ,                   
                            $otrObli ,                 
                            $otroPas ,                 
                            $TotalPas               

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
