var oTabletableLibs_lsc;

$(document).ready(function() {
    
    botonBuscarCliente();    
    oTabletableLibs_lsc = $('#tableLibs_lsc').DataTable();
    metodosInicialesDataTable();
    
    $("#linea_1").hide();
    $("#AAlerta").hide();
    $("#PanelCrearLib").hide();
    $("#btnCrearLib").hide();
    
    
  
    /** PARA CARGAR LA IMAGEN **/
    $('#photoimg').on('change', function() 
    {
        var A=$("#imageloadstatus");
        var B=$("#imageloadbutton");

        $("#imageform").ajaxForm(
            {target: '#preview', 
                beforeSubmit:function(){ A.show(); B.hide(); }, 
                success:function(){ A.hide(); B.show();}, 
                error:function(){ A.hide(); B.show(); } 
            }).submit();
    });
    
       
} );

$('#btnLscGuardarLib').click(function(){
        
        var datosEnvio = new Array;
        datosEnvio.push({ name: "IdLibranza", value: $("#IdLibranza").val() });
        datosEnvio.push({ name: "TipoIdenProv" , value: $("#lsc_tipoIdentifica option:selected").val() });
        datosEnvio.push({ name: "IdenProv"   , value: $("#lsc_identifica").val() });
        datosEnvio.push({ name: "NomDeuLib" , value: $("#NomDeuLib").val() });
        datosEnvio.push({ name: "TipoIdenDeud" , value: $("#TipoIdenDeud option:selected").val() });
        datosEnvio.push({ name: "IdenDeud"  , value: $("#IdenDeud").val() });
        datosEnvio.push({ name: "VlrCuotLibr"     , value: $("#VlrCuotLibr").val() });
        datosEnvio.push({ name: "NumCuoLib"   , value: $("#NumCuoLib option:selected").val() });
        datosEnvio.push({ name: "VlrLibranza" , value: $("#VlrLibranza").val() });
        
        $.ajax({
            url: 'crearLscLibranzaCliente.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){
                console.log(s.length);
                
                if( s === '' ){
                   $("#resultadoCreacion").html("<p>Libranza creada exitosamente</p>"); 
                }
                if( s !== '' ){
                   $("#resultadoCreacion").html("<p>La libranza ya existe</p>"); 
                }
                
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
    });

$('#btnCrearLib').click(function(){
    $("#PanelCrearLib").show();
}
);
    

function metodosInicialesDataTable(){
      $('#oTabletableLibs_lsc tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            $('#a_edicionLib').attr('class', 'disabled');
            $('#a_documentacion').attr('class', 'disabled');
           
        }
        else {
            // si es seleccionado
            oTabletableLibs_lsc.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            
            //$('.nav-tabs a[href="#mandatos"]').tab('show')
            $('#a_edicionLib').attr('class', '');
            $('#a_documentacion').attr('class', '');
            
            
            /*if( $(this)[0].cells[0].innerHTML == 'Cedula de Ciudadania' )
                $("#hd_tipo_iden").val( 1 );
            if( $(this)[0].cells[0].innerHTML == 'NIT' )
                $("#hd_tipo_iden").val( 2 );
             if( $(this)[0].cells[0].innerHTML == 'Cedula de Extranjeria' )
                $("#hd_tipo_iden").val( 3 );*/
            
            //$("#hd_iden").val( $(this)[0].cells[1].innerHTML  );
            

            /*$("#lbl_man_tipoIden").val( $(this)[0].cells[0].innerHTML  );
            $("#lbl_man_nombres").val( $(this)[0].cells[1].innerHTML );
            $("#lbl_man_apellidos").val( $(this)[0].cells[2].innerHTML + " " + $(this)[0].cells[3].innerHTML );*/
        }
    } );
}

function consultarLibranzasClie(){
    $("#AAlerta").hide();
    $("#PanelCrearLib").hide();
    $("#btnCrearLib").hide();
    oTabletableLibs_lsc.clear().draw();
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "tipoIdentifica" , value: $("#lsc_tipoIdentifica").val() });
    datosEnvio.push({ name: "identifica" , value: $("#lsc_identifica").val() });
    datosEnvio.push({ name: "opcion" , value: 1 });
    
        $.ajax({
            url: 'lsc_operacionesCliente.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){             
                if( s !== ''){
                    if( s != null ){
                        console.log(s);
                        console.log(s.length);
                        console.log(s);
                        
                        if( s.length > 1 ){
                            oTabletableLibs_lsc.rows.add( s ).draw(); 
                            //$("#PanelCrearLib").show();
                            $("#btnCrearLib").show();
                        }
                    }
                    else{
                        $("#AAlerta").show();
                        $("#linea_1").hide();
                        $("#btnCrearLib").hide();
                    }
            }
            }, error: function(e){
                
                console.log(e.responseText);	
            } 
        }); 
    
}

function botonBuscarCliente(){
    $('#btnBuscliente').click(function(){  
        
        consultarLibranzasClie();
        $("#linea_1").show();
        
        
    });
}

function edicionLibranza( idLibranza ){
    
    //$('#infoCliente').show();
    
    $("#hd_id_Libranza").val( idLibranza );
    //$("#hd_iden").val( identificacion  );
    
    $('.nav-tabs a[href="#edicionLib"]').tab('show');
    $('#a_documentacion').attr('class', 'disabled');
    //consultarMandatos(tipoIdent, identificacion);
}