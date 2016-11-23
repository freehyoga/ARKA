<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
                   
            //$temp=$_POST['tipoIdentifica'] . '*' .$_POST['numIdentifica'] . '*' . $_POST['nombre'] . $_POST['cedula'] ;      
            
            $tipoIdent = $_POST['tipoIdentifica'];
            $tipoIdentifica = $_POST['nombre1'];           
            $nombre    = $_POST['nombre'];
              
            $mvc = new mvc_controller();
            $select = $mvc->getClientes( $tipoIdent,  $tipoIdentifica , $nombre);

            if( $select != ''){
                foreach( $select as $fila ){
                    $output[] = array ( $fila['idTipoIdentificacion'], 
                                        $fila['TipoIdentificacion'], 
                                        $fila['identificacion'],
                                        $fila['nombres'], 
                                        $fila['apellidos'],
                                        $fila['Num_Celular'],
                                        $fila['email'],
                                        $fila['Direccion_Residencia'],
                                        '<div align="center"><img onclick="verMandatos(\''.$fila['idTipoIdentificacion'].'\',\''.$fila['identificacion'].'\')" src="imagenes/mandatos.ico" alt="Mandatos" style="width:30px;height:30px;"></div>'
                                        
                                      );
                }
            }else{
                $output[] = '';
                //header("location:../../index.php");
            }
            echo json_encode($output);
  
    }


/*	
    try{
            $conn = require_once 'connect.php';
            $sql= "SELECT tipoIdentificacion, identificacion FROM tipoidentificacion;";
            $result = $conn->prepare($sql) or die ($sql);

            if(!$result->execute()) {
                $json[]=array(
                    'Nombre' => 1,
                    'Primer_Apellido' => 2,
                );
                return;
            }

            if($result->rowCount() > 0){
                    $json = array();
                    while($row=$result->fetch()){
                            $json[]=array(
                                            'Nombre' => $row['tipoIdentificacion'],
                                            'Primer_Apellido' => $row['identificacion'],
                                    );
                    }
                    $json['success'] = true;
                    echo $json;
            }

    }catch(PDOException $e){
            echo 'Error: '. $e->getMesage();
    }
	
*/
/*
$output[] = array (
                'asd',
                'asdasdad'
            );

echo json_encode($output);*/