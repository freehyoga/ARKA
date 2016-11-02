<?php
   
    require "../model/login.class.php";
    if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario
        if(empty($_POST['usuario_nombre'])) {
            echo "No ha ingresado el usuario. <a href='javascript:history.back();'>Reintentar</a>";
        }else {
            $usuario_nombre = mysql_real_escape_string($_POST['usuario_nombre']);
            $usuario_nombre = trim($usuario_nombre);
            $login = new login();
            //realiza consulta al modelo
            $query = $login->recuperarContra($usuario_nombre);
            if($query->num_rows > 0 ) {
                $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
                $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
                $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
                //$usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD
                //$usuario_email = $row['usuario_email'];
                // actualizamos los datos (contraseña) del usuario que solicitó su contraseña
                $login = new login();
                $query2 = $login->actualizaContra($usuario_nombre, $usuario_clave);
                // Enviamos por email la nueva contraseña
                /**$remite_nombre = ""; // Tu nombre o el de tu página
                $remite_email = ""; // tu correo
                $asunto = "Recuperación de contraseña"; // Asunto (se puede cambiar)
                $mensaje = "Se ha generado una nueva contraseña para el usuario <strong>".$usuario_nombre."</strong>. La nueva contraseña es: <strong>".$usuario_clave."</strong>.";
                $cabeceras = "From: ".$remite_nombre." <".$remite_email.">\r\n";
                $cabeceras = $cabeceras."Mime-Version: 1.0\n";
                $cabeceras = $cabeceras."Content-Type: text/html";
                $enviar_email = mail($usuario_email,$asunto,$mensaje,$cabeceras);*/
                $enviar_email = TRUE;
                if($enviar_email) {
                    echo "La nueva contraseña ha sido enviada al email asociado al usuario ".$usuario_nombre.".";
                }else {
                    echo "No se ha podido enviar el email. <a href='javascript:history.back();'>Reintentar</a>";
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
            <div class="col-md-6 ">
                <IMG SRC="imagenes/logo.png" width="100%" height="40%">
            </div>
            <div class="col-md-6">
                <form name="form_recuContra" action="<?=$_SERVER['PHP_SELF']?>" method="post" role="form" target="blank">
                <fieldset>
                    <h2>Sistema de recuperación de contraseñas</h2>
                    <hr class="colorgraph">
                    <div class="form-group">
                        <input name="usuario_nombre" type="text" id="user_id" class="form-control input-lg" placeholder="Usuario">
                    </div>
                    <hr class="colorgraph">
                    <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="enviar" value="Recuperar Contraseña" class="btn btn-lg btn-success btn-block">
                    </div>  
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
    }
?> 