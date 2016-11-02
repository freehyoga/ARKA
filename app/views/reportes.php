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
<script src="js/reportes.js" type="text/javascript"></script>
<div align="center">
    <div class="form-group" >
        <article>   
    <div class="col-md-6" >
        <div class="form-group">
           
           <select id="listaReport" name="listaReport" class="form-control">
                <option value="0">Seleccione...</option>
                <option value="1">Libranzas por Cliente</option>
                <option value="2">Libranzas en rango de fechas</option>
                <option value="2">Libranzas proximas a vencer</option>
            </select>
        </div>
    </div>
    <div class="col-md-3" >
        <div class="form-group">
            <button id="btnGeneraRepor"  class="btn btn-primary">Generar Reporte</button>
        </div>
    </div>
            </article>   
    </div>
    <br>
</div>
<div id="panelReportes">
    <div id="filtros">
        <table id="tableLibranzasReport" class="display" cellspacing="0" width="100%" >
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
    </div>
</div>
