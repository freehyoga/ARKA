<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>PHP Login Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="recursos/bootstrap-3.3.6-dist/css/bootstrap.css">
<link rel="stylesheet" href="recursos/css/main.css">


</head>
<body>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Area</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Area/Departamento">Area/Departamento</label>
  <div class="col-md-4">
    <select id="Area/Departamento" name="Area/Departamento" class="form-control">
      <option value="1">Comercial</option>
      <option value="2">Contabilidad</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnIrArea"></label>
  <div class="col-md-4">
    <input id="btnIrArea" name="btnIrArea" type="button" class="btn btn-primary" onclick="location='inicio.php'" value="IR"/>
  </div>
</div>
</fieldset>
</form>

</body>
</html>