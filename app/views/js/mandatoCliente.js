var oTableMandCliente;
var oTableLibranzaCli;
var chart;
$(document).ready(function() {
   
    $('#a_libranzas').attr('class', 'disabled');
     $('#a_libranzas').click(function(event){        
        if ($(this).hasClass('disabled')) {
            return false;
        }
    });
    
    oTableMandCliente  = $('#tableMandatoClie').DataTable();
    oTableLibranzaCli  = $('#tableLibranzaCli').DataTable();
    
    // Boton buscar Cliente
    $('#btnBuscarCliente').click(function(){      
        consultarClienteMandato();
    });
    
    
    consultarMandatosCliente();
    
    $('#tableMandatoClie')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
        
        
    
});

function consultarClienteMandato(){
    var datosEnvio = new Array;
    datosEnvio.push({ name: "TipoIden" , value: $("#TipoIden option:selected ").val() });
    datosEnvio.push({ name: "identifica" , value: $("#identifica").val() });
    datosEnvio.push({ name: "opcion" , value: 2 });
    $('#formularioMandato').show();
    console.log("Entro a consultaCliente Mandato")
    
    if ($('#formularioMandato').hide()){
        $('#formularioMandato').hide();
    }else{
        $('#formularioMandato').show();
    }
    
}
function consultarMandatosCliente(){
    
    oTableMandCliente.clear().draw();
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "tipoIdentifica" , value: $("#hd_tipo_iden").val() });
    datosEnvio.push({ name: "identifica" , value: $("#hd_iden").val() });
    datosEnvio.push({ name: "opcion" , value: 1 });
   
        $.ajax({
            url: 'getMandatos.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){
                
                if( s != ''){
                    //console.log(s);
                    //console.log(s.length);
                    
                    if( s.length >= 1 ){
                        oTableMandCliente.rows.add( s ).draw();
                        /*for(var i = 0; i < s.length; i++) { 
                            oTableMandato.fnAddData([  s[i][0], 
                                                s[i][1],
                                                s[i][2]
                                            ]);	
                        } // End For	*/
                    }
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
         
}

function verLibranzas( mandato ){
    
    /*$('#infoCliente').show();   */ 
    $('.nav-tabs a[href="#libranzas"]').tab('show');
    $('#a_libranzas').attr('class', ''); 
    $("#lbl_mandato").val( mandato );
    
    listarLibranzas(mandato);    
    
}

function listarLibranzas(mandato){
    oTableLibranzaCli.columns(8).visible( false );
    oTableLibranzaCli.clear().draw();
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "mandato" , value: mandato });
    datosEnvio.push({ name: "opcion" , value: 2 });
   
        $.ajax({
            url: 'getMandatos.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){             
                if( s != ''){
                    //console.log(s);
                    //console.log(s.length);
                    
                    if( s.length >= 1 ){
                        oTableLibranzaCli.rows.add( s ).draw();    
                    }
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
        
}
