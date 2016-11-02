$( document ).ready(function() {
         
    $('#btnNuevaCoop').hide();
    
    $('#btnNuevaCoop').click(function(){      
        $('#formCrearCoop').children().find('input:text').each(function(){
            $(this).val('');
        });
        $("#tipoIDCoop").val('0')
    });
    
    $('#btnformCrearCoop').click(function(){
        
        var datosEnvioCoop = new Array;
        datosEnvioCoop.push({ name: "tipoIDCoop", value: $("#tipoIDCoop option:selected ").val() });
        datosEnvioCoop.push({ name: "siglaCoop" , value: $("#siglaCoop").val() });
        datosEnvioCoop.push({ name: "raznSoclCoop"   , value: $("#raznSoclCoop").val() });
        datosEnvioCoop.push({ name: "numeIdenProv" , value: $("#numeIdenProv").val() });
        datosEnvioCoop.push({ name: "DirCoop" , value: $("#DirCoop").val() });
        datosEnvioCoop.push({ name: "paginaCoop"  , value: $("#paginaCoop").val() });
        datosEnvioCoop.push({ name: "telCoop"   , value: $("#telCoop").val() });
        datosEnvioCoop.push({ name: "NomReprLCoop"     , value: $("#NomReprLCoop").val() });
        datosEnvioCoop.push({ name: "tipoIdRepre"     , value: $("#tipoIdRepre option:selected ").val() });
        datosEnvioCoop.push({ name: "numeIdenRepre"     , value: $("#numeIdenRepre").val() });
        datosEnvioCoop.push({ name: "celRepreCoop"     , value: $("#celRepreCoop").val() });
        datosEnvioCoop.push({ name: "mailReprCoop"     , value: $("#mailReprCoop").val() });
        
        $.ajax({
            url: 'crearCoop.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvioCoop, 
            success: function(s){
                console.log(s);
                
                if( s == '' ){
                   $("#resultadoCreacion").html("<p>Cooperativa creada exitosamente</p>"); 
                }
                if( s != '' ){
                   $("#resultadoCreacion").html("<p>La cooperativa ya existe</p>"); 
                }
                $('#btnNuevoCliente').show();
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
    });
    
    
    
    

    
    
   
});




