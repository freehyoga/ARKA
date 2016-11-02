var oTableLibranzasClie;

$(document).ready(function() {
       
    oTableLibranzasClie = $('#tblLibranzasCliente').DataTable();
    listarLibranzasCliente();
             
} );


function listarLibranzasCliente(){
    
    oTableLibranzasClie.clear().draw();
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "tipoIdentifica" , value: $("#hd_tipo_iden").val() });
    datosEnvio.push({ name: "identifica" , value: $("#hd_iden").val() });
    datosEnvio.push({ name: "opcion" , value: 1 });
    
        $.ajax({
            url: 'operacionesCliente.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){             
                if( s != ''){
                    console.log(s);
                    console.log(s.length);
                    
                    if( s.length >= 1 ){
                        oTableLibranzasClie.rows.add( s ).draw();    
                    }
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
        
}