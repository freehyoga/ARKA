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



<script src="js/consultaCliente.js" type="text/javascript"></script>

    <ul class="nav nav-tabs" id="tabs">
        <li class="active"><a id="a_clientes" data-toggle="tab" href="#clientes">Clientes</a></li>
        <li><a id="a_mandatos" data-toggle="tab" href="#mandatos">Mandatos</a></li>
        <li><a id="a_libranzas" data-toggle="tab" href="#libranzas">Libranzas</a></li>
    </ul>
    <br>
    <div id = "infoCliente" class="card card-block" >
        <table class="table" style="width: 53% !important; margin-bottom: -28px !important;">
            <tr>
                <td> <h2> Datos del cliente: </h2>  </td>
                <td> <output id="lbl_man_tipoIden"></output></td>
                <td> <output id="lbl_man_nombres"></output></output></td>
                <td> <output id="lbl_man_apellidos"></output></output></td>
            </tr>
        </table>
        
    </div>
    <div class="tab-content">
        <div id="clientes" class="tab-pane fade in active">
            
            <div style="display:none">
            <div class="form-group" >
                <article>                                        
                    <div class="col-md-3" >
                        <div class="form-group">
                            <label class="control-label" for="tipoIdentifica">Tipo de Identificación:</label>  
                            <select id="tipoIdentifica" name="tipoIdentifica" class="form-control">
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
                            <label class="control-label" for="identifica">Identificación:</label>   
                            <input id="identifica" name="identifica" type="text" placeholder="1022365987" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="form-group">
                            <label class="control-label" for="nombre">Nombre o razón social:</label>   
                            <input id="nombre" name="nombre" type="text" placeholder="Pepito Perez" class="form-control input-md">
                        </div>
                    </div>
                </article>      
            </div>
            <button onclick="consultarClientes();"  class="btn btn-primary">Buscar</button>
            </div>
            
            <br>
            <div id="resultadoClientes">
                <table id="jsontable" class="display table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>IdTipo</th>
                            <th>Tipo Identificacion</th>
                            <th>Identificación</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <!--th>Fecha Nacimiento</th-->
                            <th>Dirección</th>
                            <th>Mandatos</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- TAB PARA MANDATOS  -->
        <div id="mandatos" class="tab-pane fade">      
            <div id="ConsultaInfoMandatoCliente">  
                <div>   
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default borde">
                            <div class="panel-heading panel-heading-ajustado">
                              <h4 class="panel-title panel-title-ajustado"><a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Crear Mandato </a></h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="col-md-3" >
                                        <div class="form-group">
                                            <label class="control-label" for="vlrFinalMandato">Valor final mandato:</label>  
                                            <input id="vlrFinalMandato" name="vlrFinalMandato" onkeyup="format(this)" type="text" placeholder="12.000.000" class="form-control input-md">
                                        </div>
                                    </div>    
                                    <div class="col-md-3" >
                                        <div class="form-group">
                                            <button  class="btn btn-primary" id="btnCrearMandato" >Crear Mandato</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                              
                </div>
                </div>
            <table id="tableMandato" class="display" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>Mandato No.</th>
                            <th>Estado</th>
                            <th>Valor Final Mandato</th>    
                            <th>Fecha Creación</th>  
                        </tr>
                    </thead>
            </table>
        </div>  
        <!-- TAB PARA LIBRANZAS  -->
        <div id="libranzas" class="tab-pane fade">     
        <div id="ConsultaInfoLibranzaCliente">   
            <table><tr><td>Mandato No. </td><td> <h2><b><output id="lbl_mandato"></output></b></h2></td></tr></table>
            <hr>
            <table id="tableLibranza" class="display" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>No. Libranza</th>
                        <th>Tipo Identificacion</th>
                        <th>Identificación</th>
                        <th>Nombre Deudor</th>
                        <th>Valor Cuota</th> 
                        <th># Cuotas</th>
                        <th>Valor final Libranza</th>
                        <th>Cooperativa</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
            <br>
            <div id="pnlLibsAsociar" class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapLibranza"> Asociar Libranzas </a></h4>
                </div>
                <div id="collapLibranza" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table id="tableLibranzasAsociar" class="display" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>No. Libranza</th>
                                    <th>Tipo Identificacion</th>
                                    <th>Identificación</th>
                                    <th>Nombre Deudor</th>
                                    <th>Valor Cuota</th> 
                                    <th># Cuotas</th>
                                    <th>Valor final Libranza</th>
                                    <th>Cooperativa</th>
                                </tr>
                            </thead>
                        </table>
                        <button  class="btn btn-primary" id="btnAsociarLibs" >Asociar Libranzas</button>
                    </div>
                </div>
            </div>
            
            <button  class="btn btn-primary" id="btnFinalizaManda" >Finalizar</button>
            <button  class="btn btn-primary" id="btnGeneraPdf" >Generar PDF</button>
        </div>                     
        </div>
    </div>
   </div>
  <input type="hidden" id="hd_tipo_iden" name="hd_tipo_iden" value="">  
  <input type="hidden" id="hd_iden" name="hd_iden" value="">