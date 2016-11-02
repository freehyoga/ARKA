<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
       $nombres = $_SESSION['nombreUsuario'];          
    }
?>

<?php
   
    //require "../model/login.class.php";
    if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario
        if(empty($_POST['NewPass']) or empty($_POST['NewPass2']) ) {
            echo "No ha ingresado el password. <a href='javascript:history.back();'>Reintentar</a>";
        }elseif($_POST['NewPass'] <> $_POST['NewPass2']) {
            echo "Las contraseñas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
        }else{
            $usuario_nombre = $_SESSION['identificacion']; 
            $login = new login();
            //realiza consulta al modelo
           
            $query = $login->recuperarContra($usuario_nombre);
            
            if($query->num_rows > 0 ) { 
                
                $nueva_clave = $_POST['NewPass']; // generamos una nueva contraseña de forma aleatoria
                $usuario_clave = md5($nueva_clave); // la nueva contraseña que se enviará por correo al usuario
                //$usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD
                $login = new login();
                $query2 = $login->actualizaContra($usuario_nombre, $usuario_clave);
                $enviar_email = TRUE;
                
                if($enviar_email) {
                    //$mvc = new mvc_controller();
                    //$mvc->loguear( $usuario_nombre, $usuario_clave);
                    header("location:../../index.php");                    
                    //echo "La nueva contraseña ha sido asignada para el usuario con numero de identificación ".$usuario_nombre.".";
                    
                    
                }else {
                    echo "No se ha podido cambiar la contraseña. Por favor comuniquese con el administrador. <a href='javascript:history.back();'>Reintentar</a>";
                }
            }else {
                echo "El usuario <strong>".$usuario_nombre."</strong> no está registrado. <a href='javascript:history.back();'>Reintentar</a>";
            }
        }
    }else {
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Recuperar Contraseña</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="recursos/bootstrap-3.3.6-dist/css/bootstrap.css">
<!--<link rel="stylesheet" href="css/main.css">-->


</head>


<body>

<div class="container">
    <div class="row" style="margin-top:20px">
        <div class="col-md-12">
            <div class="col-md-6">
                <form name="form_recuContra" action="<?=$_SERVER['PHP_SELF']?>" method="post" role="form" target="blank">
                <fieldset>
                    <h2>Cambio de contraseña <?php echo $nombres; ?></h2>
                    <hr class="colorgraph">
                    <div class="form-group">
                        <input name="NewPass" type="password" id="pass_id" class="form-control input-lg" placeholder="Nueva Contraseña">
                    </div>
                    <div class="form-group">
                        <input name="NewPass2" type="password" id="pass_id2" class="form-control input-lg" placeholder="Escriba nuevamente la contraseña ">
                    </div>
                    
                    <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="enviar" value="Cambiar Contraseña" class="btn btn-lg btn-success btn-block">
                    </div>  
                    </div>
                </fieldset>
                </form>
            </div>
             <div class="col-md-6 ">
                <IMG SRC="imagenes/arkLogin.png" width="100%" height="40%">
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
    }
?> 