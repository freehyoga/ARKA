<?php
    
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
       $mvc4 = new mvc_controller();
       $select = $mvc4->getListaEstadoCivil();
       
       $mvc = new mvc_controller();
       $selectTipos = $mvc->getTiposIdentificacion();
       
    }
?>
<html>
<head>
  <title>ARK</title>
  <script src="js/mandatoCliente.js" type="text/javascript"></script>
</head>
<body>
		 <!---start-content---->            	
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Crear Mandato</h3>
            </div>
        <div class="panel-body">
            
            <div>
                <div class="col-md-12" >
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label class="control-label" for="identifica">Identificación del cliente:</label>   
                            <input id="identifica" name="identifica" type="text" placeholder="1022365987" class="form-control input-md">
                        </div>                    
                    </div>  
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label class="control-label" for="TipoIden">Tipo de Identificación:</label>   
                            <input id="TipoIden" name="TipoIden" type="text" placeholder="1022365987" class="form-control input-md">
                        </div>                    
                    </div> 
                    <div class="col-md-4" >
                        <div class="form-group">
                            <input id="btnBuscarCliente" name="button" type="button" value="Buscar Cliente" class="btn btn-primary">
                        </div>                    
                    </div> 
                </div>
            </div>
                  
            <!-- Form Name -->
                <!-- Text input-->
                <div class="form-group" id="formularioMandato" style="display:none">
            <article>  
                
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="TipoMandt">Tipo Mandato:</label>  
                        <select id="TipoMandt" name="TipoMandt" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Administracion libranzas">Administración de libranzas</option>
                            <!--<option value="Compra">Compra</option>-->
                        </select>
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="paisNaci">Porcentaje descuento Admin (%):</label>   
                        <input id="paisNaci" name="paisNaci" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="deptoNaci">Valor consignación:</label>   
                        <input id="deptoNaci" name="deptoNaci" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="paisNaci">Porcentaje descuento Corredor(%):</label>   
                        <input id="paisNaci" name="paisNaci" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                
            </article> 
            <input id="btnformMandato" name="button" type="button" value="Crear Mandato" class="btn btn-primary" align="center" >
            </div>
        </div>     
	</div>
        
        <div id="resultadoCreacion"> </div>
		 <!---End-content---->           
</body>
</html>
