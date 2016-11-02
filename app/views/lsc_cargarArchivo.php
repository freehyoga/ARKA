<?php
    session_start();
    require '../controller/mvc_lsc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
       $mvc = new mvc_lsc_controller();
       //$select = $mvc->getTiposIdentificacion();
   
$path = "modulo_lsc/";

function getExtension($str) 
{

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

    $valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
        {
            $name = $_FILES['photoimg']['name'];
            $size = $_FILES['photoimg']['size'];
            $idLibranza = $_POST['hd_id_Libranza'];
            
            if(strlen($name))
                {
                    $ext = getExtension($name);
                    if(in_array($ext,$valid_formats))
                    {
                        if($size<(1024*1024))
                            {
                                // obtiene altura y anchura de la imagen
                                $info = getimagesize( $_FILES['photoimg']['tmp_name'] );
                                // $info[0] anchura
                                // $info[1] altura
                                // $info[2] tipo
                                
                                $nombre = $_FILES['photoimg']['name'];
                                $imagen_temporal = $_FILES['photoimg']['tmp_name'];        
                                $type = $_FILES['photoimg']['type'];
                                
                                //archivo temporal en binario
                                $itmp = fopen($imagen_temporal, 'r+b');
                                $imagen = fread($itmp, filesize($imagen_temporal));
                                fclose($itmp);
                                
                                //escapando los caracteres
                                $imagenContent = file_get_contents($_FILES["photoimg"]["tmp_name"]);
                                
                                $guardada = $mvc->insertarImagenLibranza($info[0], $info[1], $info[2], $imagen_temporal, $idLibranza);
                                
                                echo "Imagen guardada correctamente. " . $idLibranza;
                                /*$actual_image_name = time().substr(str_replace(" ", "_", $ext), 5).".".$ext;
                                $tmp = $_FILES['photoimg']['tmp_name'];
                                if(move_uploaded_file($tmp, $path.$actual_image_name))
                                        {
                                        //mysqli_query($db,"UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");

                                                echo "<img src='modulo_lsc/".$actual_image_name."'  class='preview'>" .
                                                      $info[0] . "-" .$info[1] ."-". $info[2] . "-" ;
                                        }
                                else
                                        echo "Fail upload folder with read access.";*/
                            }
                        else
                        echo "Image file size max 1 MB";					
                    }
                        else
                        echo "Invalid file format..";	
                }
            else
                echo "Please select image..!";

                exit;
        }
}
