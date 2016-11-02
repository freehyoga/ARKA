<!DOCTYPE html>
<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
       $mvc = new mvc_controller();
       $select = $mvc->getTiposIdentificacion();
    }
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
  <title>ARK</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!--<link href="recursos/bootstrap-3.3.6-dist/css/style.css" rel="stylesheet" type="text/css"  media="all" />-->
 <link href="recursos/bootstrap-3.3.6-dist/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
 <script src="recursos/bootstrap-3.3.6-dist/js/responsive-nav.js" type="text/javascript"></script>
 <script src="recursos/bootstrap-3.3.6-dist/js/owl.carousel.js" type="text/javascript"></script>  
 <script src="js/cooperativa.js" type="text/javascript"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>COOPERATIVA</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
</head>
<body>
		 <!---start-content---->
    <div class="wrap">     	
        <!-- Form Name -->
        <div class="form_group" id="formCrearCoop">
                <!-- Text input-->
                <div class="form-group">
                    <article>
                        <section>
                            
                            <div class="col-md-3" >
                            <div class="form-group">
                                <label class="control-label" for="raznSoclCoop">Razón Social:</label>  
                                <input id="raznSoclCoop" name="raznSoclCoop" type="text" placeholder="Nombre Coop" class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label class="control-label" for="siglaCoop">Sigla:</label> 
                                <input id="siglaCoop" name="siglaCoop" type="text" placeholder="CIA" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label class="control-label" for="tipoIDCoop">Tipo Identificación:</label>  
                                <select class="form-control" id="tipoIDCoop">
                                    <?php  
                                    if( $select != ''){
                                        echo '<option value="0">Seleccione...</option>';
                                        foreach( $select as $fila ){
                                            echo '<option value=\''. $fila['TipoIdentificacion'] .'\'> ' . $fila['Identificacion'] . '</option>';
                                        }
                                    }else{
                                        echo '<option value="">Seleccione...</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" >
                            <div class="form-group">
                                <label class="control-label" for="numeIdenProv">Numero Identificación:</label> 
                                <input id="numeIdenProv" name="numeIdenProv" type="text" placeholder="840765498" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label" for="DirCoop">Direcciòn:</label>  
                                <input id="DirCoop" name="DirCoop" type="text" placeholder="calle 20 # 27 08" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label" for="paginaCoop">Pagina WEB:</label>    
                                <input id="paginaCoop" name="paginaCoop" type="text" placeholder="www.prueba.com" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label" for="telCoop">Telèfono Fijo:</label> 
                                <input id="telCoop" name="telCoop" type="text" placeholder="0312458965" class="form-control input-md">
                            </div>
                        </div>
                        </section>
                        <section>
                            
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="NomReprLCoop">Nombre Representante Legal:</label>  
                                    <input id="NomReprLCoop" name="NomReprLCoop" type="text" placeholder="Pepito Perez" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="tipoIdRepre">Tipo Identificación Representante Legal:</label>  
                                    <select class="form-control" id="tipoIdRepre">
                                        <?php  
                                        if( $select != ''){
                                            echo '<option value="0">Seleccione...</option>';
                                            foreach( $select as $fila ){
                                                echo '<option value=\''. $fila['TipoIdentificacion'] .'\'> ' . $fila['Identificacion'] . '</option>';
                                            }
                                        }else{
                                            echo '<option value="">Seleccione...</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="numeIdenRepre">N° Identificación Representante Legal:</label> 
                                    <input id="numeIdenRepre" name="numeIdenRepre" type="text" placeholder="840765498" class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="celRepreCoop">Celular Representante Legal:</label>
                                    <input id="celRepreCoop" name="celRepreCoop" type="text" placeholder="3007625412" class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="mailReprCoop">Email Representante Legal:</label>  
                                    <input id="mailReprCoop" name="mailReprCoop" type="text" placeholder="prueba@ark.com" class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-12" >
                                <input id="btnformCrearCoop" name="button" type="button" value="Guardar Coop" class="btn btn-primary" align="center" >
                                <input id="btnNuevaCoop" name="button" type="button" value="Nuevo cliente"  class="btn btn-primary" align="center" >
                            </div>
                            
                        </section>
                        
                    </article>  
                </div>
                <div id="resultadoCreacionCoop"> </div>
        </div>
    </div>		   			
		 <!---End-content---->
</body>
</html>