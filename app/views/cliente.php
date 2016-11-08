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
  <script src="js/cliente.js" type="text/javascript"></script>
</head>
<body>
		 <!---start-content---->
                 
        	
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">INFORMACION BASICA</h3>
            </div>
            <div class="panel-body">
                  
            <!-- Form Name -->
                <!-- Text input-->
        <div class="form-group" id="formularioCliente">
            <article>  
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="nombresClie">Nombres:</label>
                        <input id="nombresClie" name="nombresClie" type="text" placeholder="Juan Esteban" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="apellidosClie">Apellidos:</label>  
                        <input id="apellidosClie" name="apellidosClie" type="text" placeholder="Galindo" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="numIdentifica">Identificación:</label>   
                        <input id="numIdentifica" name="numIdentifica" type="text" placeholder="1022365987" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-4" >
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
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="fechaExped">Fecha Expedición:</label>   
                        <input id="fechaExped" name="fechaExped" type="text" placeholder="AAAA/MM/DD" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="paisExped">Pais Expedición:</label>   
                        <input id="paisExped" name="paisExped" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="form-group">
                        <label class="control-label" for="deptoExped">Depto Expedición:</label>   
                        <input id="deptoExped" name="deptoExped" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="form-group">
                        <label class="control-label" for="ciudadExped">Ciudad Expedición:</label>   
                        <input id="ciudadExped" name="ciudadExped" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="form-group">
                        <label class="control-label" for="fechaNacClie">Fecha Nacimiento:</label>   
                        <input id="fechaNacClie" name="fechaNacClie" type="text" placeholder="AAAA/MM/DD" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="genero">Género:</label>  
                        <select id="genero" name="genero" class="form-control">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="paisNaci">Pais Nacimiento:</label>   
                        <input id="paisNaci" name="paisNaci" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="form-group">
                        <label class="control-label" for="deptoNaci">Depto Nacimiento:</label>   
                        <input id="deptoNaci" name="deptoNaci" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="form-group">
                        <label class="control-label" for="ciudadNaci">Ciudad Nacimiento:</label>   
                        <input id="ciudadNaci" name="ciudadNaci" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="form-group">
                        <label class="control-label" for="nacionalidad">Nacionalidad:</label>  
                        <input id="nacionalidad" name="nacionalidad" type="text" placeholder="Colombiana" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="sinoNaciona">Tiene otras Nacionalidades:</label>  
                        <select id="sinoNaciona" name="sinoNaciona" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="observNaciona">Especifique otra nacionalidad:</label>  
                        <input id="observNaciona" name="observNaciona" type="text" placeholder="Colombiana" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="sinoReside">Residente otro pais:</label>  
                        <select id="sinoReside" name="sinoReside" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="S">Si</option>
                            <option value="N">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="observReside">Especifique:</label>  
                        <input id="observReside" name="observReside" type="text" placeholder="Colombiana" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-5" >
                    <div class="form-group">
                        <label class="control-label" for="estadoCivil">Estado Civil:</label>  
                        <select id="estadoCivil" name="estadoCivil" class="form-control">
                            <?php  
                                if( $select != ''){
                                    echo '<option value="0">Seleccione...</option>';
                                    foreach( $select as $fila ){
                                        echo '<option value=\''. $fila['id_estado'] .'\'> ' . $fila['nombre'] . '</option>';
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
                        <label class="control-label" for="nivelEduca">Nivel Educativo:</label>  
                        <select id="nivelEduca" name="nivelEduca" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Ninguno">Ninguno</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Bachiller">Bachiller</option>
                            <option value="Tecnico">Técnico</option>
                            <option value="Pregrado">Pregrado</option>
                            <option value="Posgrado">Posgrado</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="observNivelEdu">Cual:</label>  
                        <input id="observNivelEdu" name="observNivelEdu" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="form-group">
                        <label class="control-label" for="tipoVivien">Tipo Vivienda:</label>  
                        <select id="tipoVivien" name="tipoVivien" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Propia No Hipotecada">Propia No Hipotecada</option>
                            <option value="Propia Hipotecada">Propia Hipotecada</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Arrendada">Arrendada</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="observTipoVivind">Cual:</label>  
                        <input id="observTipoVivind" name="observTipoVivind" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="ciudadReside">Ciudad Residencia:</label>  
                        <input id="ciudadReside" name="ciudadReside" type="text" placeholder="Bogotá" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="direccionClie">Dirección Residencia:</label>  
                        <input id="direccionClie" name="direccionClie" type="text" placeholder="Cra 3 # 5-50" class="form-control input-md" required="">
                    </div>
                </div>    
                
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="fijoClie">Teléfono fijo:</label>
                        <input id="fijoClie" name="fijoClie" type="text" placeholder="220 54 65" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="celularClie">Celular:</label>
                        <input id="celularClie" name="celularClie" type="text" placeholder="3007625412" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="emailClie">Correo Electrónico:</label>  
                        <input id="emailClie" name="emailClie" type="text" placeholder="prueba@ark.com" class="form-control input-md">
                    </div>
                </div>
                
            </article> 
            
            </div>
        </div> 
            
            
        
	</div>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">DATOS DEL CONYUGE O COMPAÑERO PERMANENTE</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="nombrsConyg">Nombres Conyuge:</label>
                        <input id="nombrsConyg" name="nombrsConyg" type="text" placeholder="Juan Esteban" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="apelldsConyg">Apellidos Conyuge :</label>  
                        <input id="apelldsConyg" name="apelldsConyg" type="text" placeholder="Galindo" class="form-control input-md">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="numIdentfcnConyg">Identificación:</label>   
                        <input id="numIdentfcnConyg" name="numIdentfcnConyg" type="text" placeholder="1022365987" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="tipoIdentfcnConyg">Tipo de Identificación:</label>  
                        <select id="tipoIdentfcnConyg" name="tipoIdentfcnConyg" class="form-control">
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
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="fijoConyg">Teléfono fijo:</label>
                        <input id="fijoConyg" name="fijoConyg" type="text" placeholder="220 54 65" class="form-control input-md">
                    </div>
                </div>
                
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">ACTIVIDAD ECONOMICA</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="control-label" for="ocupcn">Ocupación:</label>  
                        <select id="ocupcn" name="ocupcn" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Profesional">Profesional</option>
                            <option value="Pensionado">Pensionado</option>
                            <option value="Independiente">Independiente</option>
                            <option value="Ama de casa">Ama de casa</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5" >
                    <div class="form-group">
                        <label class="control-label" for="observOcupcn">Cual:</label>  
                        <input id="observOcupcn" name="observOcupcn" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="tipoEmprs">Tipo de empresa:</label>  
                        <select id="tipoEmprs" name="tipoEmprs" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Publica">Publica</option>
                            <option value="Privada">Privada</option>
                            <option value="Mixta">Mixta</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="NitEmpre">Nit Empresa:</label>  
                        <input id="NitEmpre" name="NitEmpre" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="Sector">Sector:</label>  
                        <input id="Sector" name="Sector" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="Empresa">Empresa,Entidad pensional o Actividad Profesional:</label>  
                        <input id="Empresa" name="Empresa" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="TelEmpresa">Tel. Empresa:</label>  
                        <input id="TelEmpresa" name="TelEmpresa" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="DirEmpresa">Dirección Empresa:</label>  
                        <input id="DirEmpresa" name="DirEmpresa" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label class="control-label" for="CargoEmpresa">Cargo Desempeñado:</label>  
                        <input id="CargoEmpresa" name="CargoEmpresa" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="SueldoActual">Sueldo Actual:</label>  
                        <input id="SueldoActual" name="SueldoActual" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="tipoCont">Tipo de contrato:</label>  
                        <select id="tipoCont" name="tipoCont" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Fijo">Término Fijo</option>
                            <option value="Indefinido">Término Indefinido</option>
                            <option value="Prestacion">Prestación de Servicios</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="fechVincEmpr">Vinculado desde:</label>  
                        <input id="fechVincEmpr" name="fechVincEmpr" type="Date" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="RecursPubl">Administra Recursos Publicos:</label>  
                        <select id="RecursPubl" name="RecursPubl" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="ObsRecuPubl">Especifique:</label>  
                        <input id="ObsRecuPubl" name="ObsRecuPubl" type="text" class="form-control input-md" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="VincRecursPublc">Vinculos persona publica:</label>  
                        <select id="VincRecursPublc" name="VincRecursPublc" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="DeclaraRenta">Declara renta:</label>  
                        <select id="DeclaraRenta" name="DeclaraRenta" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="SocioEmpre">Socio Empresa:</label>  
                        <select id="SocioEmpre" name="SocioEmpre" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="PorceSoci">Porcentaje Sociedad:</label>  
                        <input id="PorceSoci" name="PorceSoci" type="number" min="0" max="100" class="form-control input-md" placeholder="%" required="">
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="form-group">
                        <label class="control-label" for="RegiTribu">Regimen Tributario:</label>  
                        <select id="RegiTribu" name="RegiTribu" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Simplificado">Simplificado</option>
                            <option value="Comun">Común</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">OPERACIONES EN MONEDA EXTRANJERA (M.E.)</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="Monedaextra">Operacion Extranjera:</label>  
                        <select id="Monedaextra" name="Monedaextra" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="TipoOpeExtra">Tipo Operacion Extranjera:</label>  
                        <select id="TipoOpeExtra" name="TipoOpeExtra" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Inversiones">Inversiones</option>
                            <option value="Servicios">Pago de servicios</option>
                            <option value="Cuentas en el exterior">Cuentas en el exterior</option>
                            <option value="Importaciones">Importaciones</option>
                            <option value="Exportaciones">Exportaciones</option>
                            <option value="Prestamos">Préstamos</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="form-group">
                        <label class="control-label" for="OtraOperExtra">Cual:</label>
                        <input id="OtraOperExtra" name="OtraOperExtra" type="text" class="form-control input-md">
                    </div>
                </div>
        </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">INFORMACIÓN FINANCIERA</h3>
            </div>
            <div class="panel-body">
                <fieldset>
                    <legend align="center">Ingresos Mensuales</legend>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="IngreFijo">Ingresos Fijos:</label>  
                                <input id="IngreFijo" name="IngreFijo" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="IngreVari">Ingresos Variables:</label>  
                                <input id="IngreVari" name="IngreVari" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                    <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="otroIngre1">Otros Ingresos:</label>  
                                <input id="otroIngre1" name="otroIngre1" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                    <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="otroIngre2">Otros Ingresos:</label>  
                                <input id="otroIngre2" name="otroIngre2" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                    <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label" for="TotalIngr">Total Ingresos:</label>  
                                <input id="TotalIngr" name="TotalIngr" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                </fieldset>
                <fieldset>
                    <legend align="center">Egresos Mensuales</legend>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="Hipoteca">Hipoteca/Arriendos:</label>  
                                <input id="Hipoteca" name="Hipoteca" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="EgreCredi">Cuota Créditos:</label>  
                                <input id="EgreCredi" name="EgreCredi" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="gastoFami">Gastos Familiares:</label>  
                                <input id="gastoFami" name="gastoFami" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="otroEngre">Otros Egresos:</label>  
                                <input id="otroEngre" name="otroEngre" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label" for="TotalEgr">Total Egresos:</label>  
                                <input id="TotalEgr" name="TotalEgr" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                </fieldset>
                <fieldset>
                    <legend align="center">Activos</legend>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="Vivienda">Vivienda/Inmuebles:</label>  
                                <input id="Vivienda" name="Vivienda" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="Vehiculo">Vehiculos:</label>  
                                <input id="Vehiculos" name="Vehiculos" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="Inver">Inversiones:</label>  
                                <input id="Inver" name="Inver" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="otroAct">Otros Activos:</label>  
                                <input id="otroAct" name="otroAct" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label" for="TotalAct">Total Activos:</label>  
                                <input id="TotalAct" name="TotalAct" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                </fieldset>
                <fieldset>
                    <legend align="center">Pasivos</legend>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="PasHipo">Hipotecas:</label>  
                                <input id="PasHipo" name="PasHipo" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="PasTc">T.C.:</label>  
                                <input id="PasTc" name="PasTc" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="otrObli">Otras Obligaciones:</label>  
                                <input id="otrObli" name="otrObli" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label class="control-label" for="otroPas">Otros Pasivos:</label>  
                                <input id="otroPas" name="otroPas" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label class="control-label" for="TotalPas">Total Pasivos:</label>  
                                <input id="TotalPas" name="TotalPas" type="number" min="0" class="form-control input-md" placeholder="$" required="">
                            </div>
                        </div>
                </fieldset>
        </div>
        </div>
        <input id="btnformCliente" name="button" type="button" value="Guardar cliente" class="btn btn-primary" align="center" >
        <input id="btnNuevoCliente" name="button" type="button" value="Nuevo cliente"  class="btn btn-primary" align="center" >
        <input id="btnPdfCliente" target="_blank" name="button" type="button" value="PDF Creacion"  class="btn btn-primary" align="center" >
        <div id="resultadoCreacion"> </div>
		 <!---End-content---->
</body>
</html>