<?php
    session_start();
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Inicio de Sesion</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="app/views/recursos/bootstrap-3.3.6-dist/css/bootstrap.css">
<!--link rel="stylesheet" href="app/views/recursos/css/main.css"-->


</head>
<!-- NAVBAR
================================================== -->

<body>

<div class="container">
  <div class="row" style="margin-top:20px">
	<div class="col-md-12">
    <div class="col-md-6 ">
        <IMG SRC="app/views/imagenes/arkLogin.jpg" >
	</div>
    <div class="col-md-6">
        <form name="form_login" method="post" action="app/views/iniciarSesion.php" role="form" >
        <fieldset>
          <h2>Bienvenido, ingrese sus credenciales</h2>
          <hr class="colorgraph">
          <div class="form-group">
            <input name="user_id" type="text" id="user_id" class="form-control input-lg" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
          </div>
          <span class="button-checkbox">
          <button type="button" class="btn" data-color="info">Recordar Contrasena</button><!-- Additional Option -->
          <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="InicioSesion" value="Login" class="btn btn-lg btn-success btn-block">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6"> <a href="http://creativealive.com/basic-registration-form-php-mysql-database-connectivity/" target="_blank" class="btn btn-lg btn-primary btn-block">Registrarme</a> </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
