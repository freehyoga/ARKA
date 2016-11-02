<?php 

  error_reporting(0);
  if(isset($_POST['submit'])){
  
        $fname = $_FILES['sel_file']['name'];
        echo 'Cargando nombre del archivo: '.$fname.' ';
        $chk_ext = explode(".",$fname);

        if(strtolower(end($chk_ext)) == "csv")
        { 
             //Establecemos la conexion con nuestro servidor de mysql local
             //$cone = new mysqli( "localhost","db_ark","ark2016","sistema_ark");
             $cone = mysql_connect( 'localhost' ,'arkactiv_db_ark','ark2016');
             if(!$cone)//en caso de no lograr establecer la conexion se quiebra el proceso...
                die('Conexion no establecida');
             
             //Verificamos si nuestra base de datos existe.   
             if (!mysql_select_db("arkactiv_sistema_ark"))//en caso de no existir quiebra el proceso...
                die("base de datos no existe");
                
            //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r"); 
              while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
                  if(strtoupper($data[0]) != "NOMBRES"){
                      //Insertamos los datos con los valores...
                    $sql = "INSERT INTO libranzatemp (idLibranza, Proveedor_TipoIdentificacion, Proveedor_Identificacion, Nombre_Deud_Libra, Tipo_Iden_Deud, Nume_Iden_Deud, Vlr_Cuot_Libra, Nro_Cuot_Libra, Vlr_Fin_Libra)";
                    $sql .= " values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";

                    mysql_query($sql) or die(mysql_error());
                    
                  }
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
        }else{
            echo '<br> Formato de archivo incorrecto';    
        }

  }
  
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--<link href="recursos/bootstrap-3.3.6-dist/css/style.css" rel="stylesheet" type="text/css"  media="all" />-->
    <link href="recursos/bootstrap-3.3.6-dist/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
    <script src="recursos/bootstrap-3.3.6-dist/js/responsive-nav.js" type="text/javascript"></script>
    <script src="recursos/bootstrap-3.3.6-dist/js/owl.carousel.js" type="text/javascript"></script>  
</head>

<body>
    <h1>Importar archivo CSV</h1>
    <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
    Importar Libranzas de la cooperativa : <input type='file' name='sel_file' size='20'>
    <input type='submit' name='submit' value='submit'>
    </form>
</body>
</html>