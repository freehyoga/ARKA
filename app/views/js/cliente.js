$( document ).ready(function() {
         
    //getTiposIdentifica("tipoIdentifica");
    
    $("#fechaNacClie").datepicker({
       format: 'yyyy/mm/dd',
    });
   
    

    
    $('#btnNuevoCliente').hide();
    $('#btnPdfCliente').hide();
    
    
    $('#btnNuevoCliente').click(function(){      
        $('#formularioCliente').children().find('input:text').each(function(){
            $(this).val('');
        });
        $("#tipoIdentifica").val('0');
        $('#btnNuevoCliente').hide();
        $('#btnPdfCliente').hide();
        $("#resultadoCreacion").html("");
    });
    
    $('#btnformCliente').click(function(){
        
        var datosEnvio = new Array;
        datosEnvio.push({ name: "tipoIdentifica", value: $("#tipoIdentifica option:selected ").val() });
        datosEnvio.push({ name: "numIdentifica" , value: $("#numIdentifica").val() });
        datosEnvio.push({ name: "nombresClie"   , value: $("#nombresClie").val() });
        datosEnvio.push({ name: "apellidosClie" , value: $("#apellidosClie").val() });
        datosEnvio.push({ name: "fechaNacClie"  , value: $("#fechaNacClie").val() });
        datosEnvio.push({ name: "fechaExped"     , value: $("#fechaExped").val() });
        datosEnvio.push({ name: "paisExped"     , value: $("#paisExped").val() });
        datosEnvio.push({ name: "deptoExped"     , value: $("#deptoExped").val() });
        datosEnvio.push({ name: "ciudadExped"     , value: $("#ciudadExped").val() });
        datosEnvio.push({ name: "fechaNacClie"     , value: $("#fechaNacClie").val() });
        datosEnvio.push({ name: "genero"     , value: $("#genero option:selected").val() });
        datosEnvio.push({ name: "paisNaci"     , value: $("#paisNaci").val() });
        datosEnvio.push({ name: "deptoNaci"     , value: $("#deptoNaci").val() });
        datosEnvio.push({ name: "ciudadNaci"     , value: $("#ciudadNaci").val() });
        datosEnvio.push({ name: "nacionalidad"     , value: $("#nacionalidad").val() });
        datosEnvio.push({ name: "sinoNaciona"     , value: $("#sinoNaciona option:selected ").val() });
        datosEnvio.push({ name: "observNaciona"     , value: $("#observNaciona").val() });
        datosEnvio.push({ name: "sinoReside"     , value: $("#sinoReside").val() });
        datosEnvio.push({ name: "observReside"     , value: $("#observReside").val() });
        datosEnvio.push({ name: "estadoCivil"     , value: $("#estadoCivil option:selected ").val() });
        datosEnvio.push({ name: "nivelEduca"     , value: $("#nivelEduca option:selected ").val() });
        datosEnvio.push({ name: "observNivelEdu"     , value: $("#observNivelEdu").val() });
        datosEnvio.push({ name: "tipoVivien"     , value: $("#tipoVivien option:selected ").val() });
        datosEnvio.push({ name: "observTipoVivind"     , value: $("#observTipoVivind").val() });
        datosEnvio.push({ name: "ciudadReside"     , value: $("#ciudadReside").val() });
        datosEnvio.push({ name: "direccionClie"     , value: $("#direccionClie").val() });
        datosEnvio.push({ name: "fijoClie"     , value: $("#fijoClie").val() });
        datosEnvio.push({ name: "celularClie"     , value: $("#celularClie").val() });
        datosEnvio.push({ name: "emailClie"     , value: $("#emailClie").val() });
        
        /*****Captura de datos del conyugue *******/
        datosEnvio.push({ name: "nombrsConyg"     , value: $("#nombrsConyg").val() });
        datosEnvio.push({ name: "apelldsConyg"     , value: $("#apelldsConyg").val() });
        datosEnvio.push({ name: "numIdentfcnConyg"     , value: $("#numIdentfcnConyg").val() });
        datosEnvio.push({ name: "tipoIdentfcnConyg"     , value: $("#tipoIdentfcnConyg option:selected ").val() });
        datosEnvio.push({ name: "fijoConyg"     , value: $("#fijoConyg").val() });
        
        /*******Captura de datos de la actividad economica******/
        
        datosEnvio.push({ name: "ocupcn"     , value: $("#ocupcn option:selected ").val() });
        datosEnvio.push({ name: "observOcupcn"     , value: $("#observOcupcn").val() });
        datosEnvio.push({ name: "tipoEmprs"     , value: $("#tipoEmprs option:selected ").val() });
        datosEnvio.push({ name: "NitEmpre"     , value: $("#NitEmpre").val() });
        datosEnvio.push({ name: "Sector"     , value: $("#Sector").val() });
        datosEnvio.push({ name: "Empresa"     , value: $("#Empresa").val() });
        datosEnvio.push({ name: "TelEmpresa"     , value: $("#TelEmpresa").val() });
        datosEnvio.push({ name: "DirEmpresa"     , value: $("#DirEmpresa").val() });
        datosEnvio.push({ name: "CargoEmpresa"     , value: $("#CargoEmpresa").val() });
        datosEnvio.push({ name: "SueldoActual"     , value: $("#SueldoActual").val() });
        datosEnvio.push({ name: "tipoContr"     , value: $("#tipoCont option:selected").val() });
        datosEnvio.push({ name: "fechVincEmpr"     , value: $("#fechVincEmpr").val() });
        datosEnvio.push({ name: "Recurs"     , value: $("#RecursPubl option:selected ").val() });
        datosEnvio.push({ name: "ObsRecuPubl"     , value: $("#ObsRecuPubl").val() });
        datosEnvio.push({ name: "VincRecurs"     , value: $("#VincRecursPubl option:selected ").val() });
        datosEnvio.push({ name: "DeclaraRenta"     , value: $("#DeclaraRenta option:selected ").val() });
        datosEnvio.push({ name: "SocioEmpre"     , value: $("#SocioEmpre option:selected ").val() });
        datosEnvio.push({ name: "PorceSoci"     , value: $("#PorceSoci").val() });
        datosEnvio.push({ name: "RegiTribu"     , value: $("#RegiTribu option:selected ").val() });
        
         /*******Captura de datos de OPERACIONES EN MONEDA EXTRANJERA ******/
         
         datosEnvio.push({ name: "Monedaextra"     , value: $("#Monedaextra option:selected").val() });
         datosEnvio.push({ name: "TipoOpeExtra"     , value: $("#TipoOpeExtra option:selected").val() });
         datosEnvio.push({ name: "OtraOperExtra"     , value: $("#OtraOperExtra").val() });
         
         /*******Captura de datos de INFORMACIÓN FINANCIERA ******/
         
         datosEnvio.push({ name: "IngreFijo"     , value: $("#IngreFijo").val() });
         datosEnvio.push({ name: "IngreVari"     , value: $("#IngreVari").val() });
         datosEnvio.push({ name: "otroIngre1"     , value: $("#otroIngre1").val() });
         datosEnvio.push({ name: "otroIngre2"     , value: $("#otroIngre2").val() });
         datosEnvio.push({ name: "totalIngr"     , value: $("#TotalIngr").val() });
         datosEnvio.push({ name: "Hipoteca"     , value: $("#Hipoteca").val() });
         datosEnvio.push({ name: "EgreCredi"     , value: $("#EgreCredi").val() });
         datosEnvio.push({ name: "gastoFami"     , value: $("#gastoFami").val() });
         datosEnvio.push({ name: "otroEngre"     , value: $("#otroEngre").val() });
         datosEnvio.push({ name: "TotalEgr"     , value: $("#TotalEgr").val() });
         datosEnvio.push({ name: "Vivienda"     , value: $("#Vivienda").val() });
         datosEnvio.push({ name: "Vehiculos"     , value: $("#Vehiculos").val() });
         datosEnvio.push({ name: "Inver"     , value: $("#Inver").val() });
         datosEnvio.push({ name: "otroAct"     , value: $("#otroAct").val() });
         datosEnvio.push({ name: "TotalAct"     , value: $("#TotalAct").val() });
         datosEnvio.push({ name: "PasHipo"     , value: $("#PasHipo").val() });
         datosEnvio.push({ name: "PasTc"     , value: $("#PasTc").val() });
         datosEnvio.push({ name: "otrObli"     , value: $("#otrObli").val() });
         datosEnvio.push({ name: "otroPas"     , value: $("#otroPas").val() });
         datosEnvio.push({ name: "TotalPas"     , value: $("#TotalPas").val() });
              
         datosEnvio.push({ name: "opcion" , value: '1' });
        
        $.ajax({
            url: 'crearCliente.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){
                console.log(s.length);
                
                if( s == '' ){
                   $("#resultadoCreacion").html("<p>Cliente creado exitosamente</p>"); 
                }
                if( s != '' ){
                   $("#resultadoCreacion").html("<p>El cliente ya existe</p>"); 
                }
                $('#btnNuevoCliente').show();
                $('#btnPdfCliente').show();
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
    });
    
     $('#btnPdfCliente').click(function(){
        var tipo  = $("#tipoIdentifica option:selected ").val();
	var ident = $("#numIdentifica").val();
        reportePDF(tipo, ident);
     });
    
    
    

    
    
   
});


function reportePDF(tipoIden, identifica){	
	window.open('pdfCreacCliente.php?vartipoid='+tipoIden+'&identifica='+identifica);
}



