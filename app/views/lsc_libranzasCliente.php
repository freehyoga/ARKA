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
<script src="js/lsc_libCliente.js" type="text/javascript"></script>
<script src="recursos/jquery.wallform.js" type="text/javascript"></script>

<!--script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/2.1.1/jquery.min.js"></script!-->

<div class="form-group" >
    <article>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">CONSULTA DE CLIENTE PARA ASOCIAR LIBRANZA</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="lsc_tipoIdentifica">Tipo de Identificación:</label>  
                        <select id="lsc_tipoIdentifica" name="lsc_tipoIdentifica" class="form-control">
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
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="lsc_identifica">Identificación:</label>   
                        <input id="lsc_identifica" value="7305627" name="lsc_identifica" type="text" placeholder="1022365987" class="form-control input-md">
                    </div>
                </div>   
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" id="btnBuscliente">Buscar</button>
                </div>
                <div class="col-md-4">
                    <button  class="btn btn-primary" id="btnCrearLib">Crear Libranza</button>
                </div>
            </div>
            
            <br>
        </div>
    </article>
    <br>
</div>                     
<br>

<div id="AAlerta" class="col-md-12">
    <div class="col-md-12">
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert" ><span>&times;</span></button>
            Este cliente no existe. Por favor verifique!
        </div>
    </div>
</div>

<div id="PanelCrearLib" class="col-md-12">
    <div class="panel-group" id="accordion">
                <div class="panel panel-default borde">
                    <div class="panel-heading panel-heading-ajustado">
                      <h4 class="panel-title"><a> Crear Libranza </a></h4>
                    </div>
                    <div class="panel-body">
                        <article>  
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="IdLibranza">Numero Libranzas:</label>
                                    <input id="IdLibranza" name="IdLibranza" type="text" placeholder="ABC1231" class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group">
                                    <label class="control-label" for="TipoIdenProv">Tipo Iden Proveedor:</label>  
                                    <select id="TipoIdenProv" name="TipoIdenProv" class="form-control">
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
                                    <label class="control-label" for="IdenProv">Identificación Proveedor:</label>   
                                    <input id="IdenProv" name="IdenProv" type="text" placeholder="1022365987" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="NomDeuLib">Deudor Libranza:</label>   
                                    <input id="NomDeuLib" name="NomDeuLib" type="text" placeholder="Jose Caceres" class="form-control input-md" required="">
                                </div>
                            </div>  
                            <div class="col-md-3" >
                                <div class="form-group">
                                    <label class="control-label" for="TipoIdenDeud">Tipo Iden Deudor:</label>  
                                    <select id="TipoIdenDeud" name="TipoIdenDeud" class="form-control">
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
                                    <label class="control-label" for="IdenDeud">Identificación Deudor:</label>   
                                    <input id="IdenDeud" name="IdenDeud" type="text" placeholder="1018999675" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="VlrCuotLibr">Valor Cuota Libranza:</label>  
                                    <input id="VlrCuotLibr" name="VlrCuotLibr" type="text" placeholder="200.000" class="form-control input-md" required="">
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group">
                                    <label class="control-label" for="NumCuoLib">Numero Cuotas Libranza:</label>  
                                    <select id="NumCuoLib" name="NumCuoLib" class="form-control">
                                        <option value="Diez">10</option>
                                        <option value="Veinte">20</option>
                                    </select>
                                </div>
                            </div>               
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="control-label" for="VlrLibranza">Valor Libranza:</label>  
                                    <input id="VlrLibranza" name="VlrLibranza" type="text" placeholder="100.000.000" class="form-control input-md" required="">
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                     <input id="btnLscGuardarLib" name="button" type="button" value="Guardar Libranza" class="btn btn-primary" align="center" >
                                </div>
                            </div>
                        </article>  
                    </div>
                    
                </div>
            </div>
    
</div>

<div id="linea_1">
<ul class="nav nav-tabs" id="tabs">
    <li class="active"><a id="a_clientes" data-toggle="tab" href="#libranzas_lsc">Libranzas</a></li>
    <li><a id="a_edicionLib" data-toggle="tab" href="#edicionLib">Editar Libranza</a></li>
    <li><a id="a_documentacion" data-toggle="tab" href="#documentacion">Documentacion</a></li>
</ul>
    <div class="tab-content">
        <div id="libranzas_lsc" class="tab-pane fade in active">
            <br>
            <table id="tableLibs_lsc" class="display table" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>No. Libranza</th>
                            <th>Tipo Identificacion</th>
                            <th>Identificación</th>
                            <th>Nombre Deudor</th>
                            <th>Valor Cuota</th> 
                            <th># Cuotas</th>
                            <th>Valor final Libranza</th>
                            
                            <th></th>
                        </tr>
                    </thead>
            </table>
            
        </div>
        <!-- TAB PARA EDITAR LA LIBRANZA  -->
        <div id="edicionLib" class="tab-pane fade">      
            <br><br>
            <div id='preview'></div>
            <form id="imageform" method="post" enctype="multipart/form-data" action='lsc_cargarArchivo.php'>
                Upload image: 
                <div id='imageloadstatus' style='display:none'><img src="imagenes/loader_img.gif" alt="Uploading...."/></div>
                <div id='imageloadbutton'>
                    <input type="file" name="photoimg" id="photoimg" />
                </div>
                <input type="hidden" id="hd_id_Libranza" name="hd_id_Libranza" value="">  
            </form>
        </div>  
        <!-- TAB PARA LIBRANZAS  -->
        <div id="documentacion" class="tab-pane fade">     
            
        </div>
    </div>
</div>