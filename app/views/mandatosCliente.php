<?php
    session_start();
    require '../controller/mvc.controller.php';
    
    if( !$_SESSION['inicio_sesion'] ){
        header("location:../../index.php");
    }else{
        $tipoIdent = $_SESSION['tipoIdentificacion'];
        $identifica= $_SESSION['identificacion'];
    }
?>
        
        <script src="js/mandatoCliente.js" type="text/javascript"></script>

       
    <br>            
    <div class="container">
        <ul class="nav nav-tabs" id="tabs">
            <li class="active"><a id="a_mandatos" data-toggle="tab" href="#mandatos">Mandatos</a></li>
            <li><a id="a_libranzas" data-toggle="tab" href="#libranzas">Libranzas</a></li>
        </ul>                
    </div>
    <div class="tab-content">
        <div id="mandatos" class="tab-pane fade in active">

            <table id="tableMandatoClie" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th>Mandato No.</th>
                        <th>Estado</th>
                        <th>Valor Final Mandato</th>    
                        <th>Fecha Creación</th>  
                    </tr>
                </thead>
            </table>

            <br><br>
            
        </div>
        <div id="libranzas" class="tab-pane fade in">
            <br>
            <table><tr><td>Mandato No. </td><td> <h2><b><output id="lbl_mandato"></output></b></h2></td></tr></table>
            <hr>
            <table id="tableLibranzaCli" class="display" cellspacing="0" width="100%" >
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
            
            
          
        </div>
    </div>
    
      


    
        <?php
            echo '<input type="hidden" id="hd_tipo_iden" name="hd_tipo_iden" value="'. $tipoIdent .'">';
            echo '<input type="hidden" id="hd_iden" name="hd_iden" value="'. $identifica .'">';
        
