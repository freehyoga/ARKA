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

<script src="js/libranzasCliente.js" type="text/javascript"></script>

<table id="tblLibranzasCliente" class="display" cellspacing="0" width="100%" >
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
<?php
            echo '<input type="hidden" id="hd_tipo_iden" name="hd_tipo_iden" value="'. $tipoIdent .'">';
            echo '<input type="hidden" id="hd_iden" name="hd_iden" value="'. $identifica .'">';
?>