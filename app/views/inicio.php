<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
       $nombres = $_SESSION['nombreUsuario'];      
       if( !$_SESSION['menu'] ){
           echo "no hay menu";
       }else{
           $menu  = $_SESSION['menu'];
        }   
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ARK - S.A.S</title>
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS de Bootstrap -->
    <link href="recursos/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="recursos/bootstrap-3.3.6-dist/css/style.css">
    <link rel="stylesheet" href="recursos/bootstrap-3.3.6-dist/js/jquery-ui.css">
    <!--link href="recursos/bootstrap-3.3.6-dist/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/-->
    <link href="recursos/bootstrap-3.3.6-dist/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="recursos/bootstrap-3.3.6-dist/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
	
    <!-- Librería jQuery requerida por los plugins de JavaScript -->  
    <script src="recursos/bootstrap-3.3.6-dist/js/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script src="recursos/bootstrap-3.3.6-dist/js/jquery-ui.js"></script>
    <script src="recursos/bootstrap-3.3.6-dist/js/jquery.dataTables.min.js" type="text/javascript"></script>
    	<!--script src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script-->
    <script src="js/funcionesGenerales.js" type="text/javascript"></script>
    
    <script src="recursos/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="recursos/bootstrap-3.3.6-dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="recursos/bootstrap-3.3.6-dist/js/dataTables.buttons.min.js" type="text/javascript"></script>
    
    <link href="css/style2.css" rel="stylesheet" type="text/css">
    <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
  </head>
  
  <body>
      
      <nav class="navbar navbar-inverse">
          <div class="container-fluid">
                              
              <div class="navbar-header">
                  <img class="img-responsive" src="imagenes/arkLoginHeader.png" width="75%">
              </div>
              <ul class="nav navbar-nav">
                  <li><a href="#">Inicio</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Creación<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li onclick="getPage('cliente.php','Crear Cliente')"><a href="#">Creación cliente</a></li>
                          <li><a href="#">Creacion mandato</a></li>
                          <li><a href="#">Creación libranza</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consulta<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                          <li><a href="#">Consultar cliente</a></li>
                          <li><a href="#">Consultar mandato</a></li>
                          <li><a href="#">Consultar libranza</a></li>
                    </ul>
                   </li>
              </ul>
              
          </div>
          
      </nav>
      <!--
	<div class="col-md-12"> 
            <nav class="navbar navbar-inverse nav-estilo">
                <table style="width: 98%">
                    <tr>
                        <td>
                            <img class="img-responsive" src="imagenes/arkLogin.png" width="12%">
                            <span> <h3 class="color_letra">Bienvenido <?php echo $nombres; ?></h3>  </span>
                        </td>
                        <td align="left">
                            
                        </td>
                        <td align="rigth">
                            <div >
                            <form action="cerrar.php" method="post" >
                                <input class="form-control color_letra" type="submit" name="cerrar_s" value="Cerrar Sesion">
                            </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </nav>                       
        </div>-->              
			
        <div class="col-md-2"> 
            <?php 
                $nivel = "";
                $cadenaFinMenu = "</div></div>";
                $html = "";
                $nivelTemp = "";
                $primeraVez = 1;
                $menu_tmp = $menu;
                
                /*foreach( $menu as $fila ){
                    if( $fila['url'] == "" )
                    {   
                        if($primeraVez == 0){
                            $html .= $cadenaFinMenu;
                            $primeraVez = 0;
                        }else{
                            $primeraVez = 0;
                        }
                        if( substr( $fila['nivel'], 0, 1) == '*' ){
                            $nivel = substr($fila['nivel'], 1);
                            $html .= '<div class="panel panel-primary">';
                            $html .= '<div class="list-group">';
                            $html .= '<button type="button" class="list-group-item active">'. $fila['nombreMenu'] .'</button>';                      
                        }
                    }else{
                        if( $fila['nivel'] == $nivel ){
                            $html .= '<button type="button" class="list-group-item" onClick="getPage(\''. $fila['url'] .'\',\''. $fila['nombreMenu'].'\');">'. $fila['nombreMenu'].'</button>';                            
                        }
                    }
                }
                $html .= $cadenaFinMenu;               
                echo $html ;*/
                
                foreach( $menu as $fila ){
                    if( $fila['url'] == "" )
                    {
                        $nivel = substr($fila['nivel'], 1);
                        $html .= '<div class="panel panel-primary">';
                        $html .= '<div class="list-group">';
                        $html .= '<button type="button" class="list-group-item active">'. $fila['nombreMenu'] .'</button>'; 
                        
                        foreach( $menu_tmp as $fila_tmp ){
                            if( $fila_tmp['nivel'] == $nivel ){
                                $html .= '<button type="button" class="list-group-item" onClick="getPage(\''. $fila_tmp['url'] .'\',\''. $fila_tmp['nombreMenu'].'\');">'. $fila_tmp['nombreMenu'].'</button>';                            
                            }
                        }
                        $html .= $cadenaFinMenu; 
                    }
                }
                echo $html ;
                ?>
                
            
            <!--div class="panel panel-primary">
                    <div class="list-group">
                      <button type="button" class="list-group-item active">Clientes</button>
                      <button type="button" class="list-group-item" onClick="getPage('cliente.php', 'Creación Cliente');">Crear</button>
                      <button type="button" class="list-group-item" onClick="getPage('consultaCliente.php', 'Consulta Clientes');">Consultar</button>
                    </div>					
            </div>

            <div class="panel panel-primary">
                    <div class="list-group">
                      <button type="button" class="list-group-item active">Cooperativas</button>
                      <button type="button" class="list-group-item" onClick="getPage('cooperativa.php', 'Creación Cooperativa');">Crear</button>
                      <button type="button" class="list-group-item">Consultar</button>
                    </div>					
            </div-->					
        </div>
			
            <div class="col-md-10">
                <div class="panel panel-default">                  
                    <div class="panel-body">                      
                        <div id="tituloMenu"> </div>
                        <!--<hr style="color: #0056b2;"  size="10"/>-->
                        <div id="output">
                            <h2>Con Edward Force podrá interactuar, manejar y administrar su cartera; así como sus compras y podrá conocer en línea las últimas noticias.</h2>
                        </div>
                        </div>
                </div>
                <div id="popup" > </div>
            </div>
                	<script>
				function getPage(id, titulo) {
					//$('#output').html('<img src="imagenes/loader.gif" />');
					//$('#tituloMenu').html('Menu ' + titulo);
                                        
					jQuery.ajax({
						url: id,
						dataType: 'html',
						type: "POST",
						success:function(data){$('#output').html(data);},
                                                error: function(e){ console.log(e.responseText);}	
             
					});
				}
				//getPage('consultaCliente.php', 'Consultar Clientes');
			</script>
    
  </body>
</html>
