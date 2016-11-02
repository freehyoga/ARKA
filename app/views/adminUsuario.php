<?php
    
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
       $mvc = new mvc_controller();
       $selectTipos = $mvc->getTiposIdentificacion();
       $mvc2 = new mvc_controller();
       $selectPerfiles = $mvc2->getPerfiles();
    }
    
 
?>
<html>
<head>
  <title>ARK</title>
  <script src="js/adminUsuario.js" type="text/javascript"></script>
</head>
<body>
    <div class="wrap">     	
        <div class="form-group" id="formularioCliente">
            <article>  
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="nombresUsua">Nombres:</label>
                        <input id="nombresUsua" name="nombresUsua" type="text" placeholder="Juan Esteban" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="apellidosUsua">Apellidos:</label>  
                        <input id="apellidosUsua" name="apellidosUsua" type="text" placeholder="Galindo" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="tipoIdentifica">Tipo de Identificación:</label>  
                        <select id="tipoIdentifica" name="tipoIdentifica" class="form-control">
                            <?php  
                                if( $selectTipos != ''){
                                    echo '<option value="0">Seleccione...</option>';
                                    foreach( $selectTipos as $fila ){
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
                        <label class="control-label" for="numIdentifica">Identificación:</label>   
                        <input id="numIdentifica" name="numIdentifica" type="text" placeholder="1022365987" class="form-control input-md" required="">
                    </div>
                </div>                
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="password">Password:</label>   
                        <input id="password" name="password" type="password" placeholder="******" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="perfil">Perfil:</label>  
                        <select id="perfil" name="perfil" class="form-control">
                            <?php  
                                if( $selectPerfiles != ''){
                                    echo '<option value="0">Seleccione...</option>';
                                    foreach( $selectPerfiles as $fila ){
                                        echo '<option value=\''. $fila['Id_Perfil'] .'\'> ' . $fila['nombre_perfil'] . '</option>';
                                    }
                                }else{
                                    echo '<option value="">Seleccione...</option>';
                                }
                            ?>
                          
                        </select>
                    </div>
                </div>
            </article>
        </div>
        <div class="form-group" >
            <input id="btnformUsuario" name="button" type="button" value="Guardar Usuario" class="btn btn-primary" align="center" >
        </div>
    </div>
    <div id="resultadoCreacion"> </div>
</body>
</html>

