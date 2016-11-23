var oTable;
var oTableMandato;
var oTableLibranza;
var oTableLibranzasAsociar;

$(document).ready(function() {
        
    $('#infoCliente').hide();
    
    oTable         = $('#jsontable').DataTable( );
    oTableMandato  = $('#tableMandato').DataTable();
    oTableLibranza = $('#tableLibranza').DataTable();
    oTableLibranzasAsociar = $('#tableLibranzasAsociar').DataTable();
    oTable.columns(0).visible( false );

    metodosInicialesCliente();
    metodosInicialesLibranzas();   
    metodosInicialesTabs();
   
    // Boton crear mandato
    $('#btnCrearMandato').click(function(){      
        crearMandato();
    });
    
    consultarClientes();
             
} );


function consultarClientes(){
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "tipoIdentifica" , value: $("#tipoIdentifica option:selected ").val() });
    datosEnvio.push({ name: "nombre1" , value: $("#identifica").val() });
    datosEnvio.push({ name: "nombre"       , value: $("#nombre").val() });
   
        $.ajax({
            url: 'getClientes.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){
                console.log("Pailas");
                //oTable.fnClearTable();
                oTable.clear().draw();
                console.log("Pailas");
                //console.log(s);
                if( s !== ''){
                    //console.log(s);
                    //console.log(s.length);
                    console.log("Pailas");
                    if( s.length >= 1 ){
                        oTable.rows.add( s ).draw();     
                        /*
                        for(var i = 0; i < s.length; i++) { 
                            oTable.rows.add( s );                            
                            /*oTable.fnAddData([  s[i][0], 
                                                s[i][1],
                                                s[i][2],
                                                s[i][3],
                                                s[i][4],
                                                s[i][5],
                                                s[i][6],
                                                s[i][7],
                                                s[i][8],
                                                s[i][9]
                                            ]);	
                        } // End For	
                        oTable.draw();
                        */
                       console.log("Entro");
                    }
                }
            }, error: function(e){ 
                console.log(e.responseText);	
                //console.log("errors");	
            } 
        }); 
        $('#resultadoClientes').show();

    
    
   /* $.ajax({
        data:  datosEnvio,
        url:   'getClientes.php',
        type:  'post',
        beforeSend: function () {
                $("#resultadoClientes").html("Procesando, espere por favor...");
        },
        success:  function (response) {
                $("#resultadoClientes").html(response);
        }
    });*/
    
    /*
    $.ajax({
		url: './getClientes.php',
		type: 'post',
		data: {tag: 'getData'},
		dataType: 'json',
		success: function(data){
			if(data.success){
                                alert(data);
				$.each(data, function(index, record){
					if($.isNumeric(index)){
                                            alert();
                                            var row = $("<tr />");
                                            $("<td />").text(record.Nombre).appendTo(row);
                                            $("<td />").text(record.Primer_Apellido).appendTo(row);
                                            row.appendTo("datatables");
					}
				});
			}

			$('#datatables').dataTable({
				"bJQueryUI": true,
				"sPaginationType":"full_numbers"
				//dom: 'Bfrtip',
				//buttons:['excel']
			});
		},
                error: function(xhr, ajaxOptions, thrownError){  // error handling
                   alert(xhr.status + "" + thrownError);
							
                }
	});
    */
    
    
    
    
}

function verMandatos( tipoIdent, identificacion ){
    
    $('#infoCliente').show();
    
    $("#hd_tipo_iden").val( tipoIdent );
    $("#hd_iden").val( identificacion  );
    
    $('.nav-tabs a[href="#mandatos"]').tab('show');
    $('#a_libranzas').attr('class', 'disabled');
    consultarMandatos(tipoIdent, identificacion);
}

function verLibranzas( mandato ){
    
    $('#infoCliente').show();   
    $('.nav-tabs a[href="#libranzas"]').tab('show');
    $('#a_mandatos').attr('class', '');  
    $("#lbl_mandato").val( mandato );
    
    listarLibranzas(mandato);
 
    // VERIFICAR EL ESTADO DEL MANDATO PARA CARGAR LAS LIBRANZAS
    consultarMandato( mandato ); 
      
}

function consultarMandato( id_mandato ){
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "mandato" , value: id_mandato });
    datosEnvio.push({ name: "opcion" , value: 7 });
   
        $.ajax({
            url: 'getMandatos.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){             
                if( s != ''){
                    console.log(s);
                    
                    // SI ESTADO ES ASIGNADO SE OCULTA CAMPOS DE ASOCIAR LIBRANZAS
                    
                    if( s[0][1] == 1 ){
                        $("#pnlLibsAsociar").show();
                        $("#btnGeneraPdf").hide();
                        $("#btnFinalizaManda").show();
                        cargarLibranzasAsociar();
                    }
                    // SI ESTADO ES PENDIENTE SE MUESTRAN CAMPOS PARA ASOCIAR LIBS
                    else{
                        if( s[0][1] == 2 ){
                            $("#pnlLibsAsociar").hide();
                            $("#btnGeneraPdf").show();
                            $("#btnFinalizaManda").hide();
                            
                        }
                    }
                    
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
}

function listarLibranzas(mandato){
    oTableLibranza.clear().draw();
    
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
                        oTableLibranza.rows.add( s ).draw();    
                    }
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
}

function consultarMandatos( tipoIdent, identificacion ){
    
    oTableMandato.clear().draw();
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "tipoIdentifica" , value: tipoIdent });
    datosEnvio.push({ name: "identifica" , value: identificacion });
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
                        oTableMandato.rows.add( s ).draw();
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
        $('#resultadoClientes').show();
    
}

function crearMandato(){
    var datosEnvio = new Array;
    
    if( $("#lbl_man_tipoIden").val() == 'Cedula de Ciudadania' )
        datosEnvio.push({ name: "tipoIdentifica" , value: 1 });
    if( $("#lbl_man_tipoIden").val() == 'NIT' )
        datosEnvio.push({ name: "tipoIdentifica" , value: 2 });
    if( $("#lbl_man_tipoIden").val() == 'Cedula de Extranjeria' )
        datosEnvio.push({ name: "tipoIdentifica" , value: 3 });
    
    datosEnvio.push({ name: "identifica" , value: $("#lbl_man_nombres").val() });
    datosEnvio.push({ name: "vlrMandato" , value: $("#vlrFinalMandato").val() });
    datosEnvio.push({ name: "opcion" , value: 3 });

        $.ajax({
            url: 'getMandatos.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){
                //console.log(s);
                if( s != ''){
                    //capturarColumna(s);
                    alert("Se créo el mandato No.[" + s[0][0] +"]");
                    consultarMandatos( $("#hd_tipo_iden").val() , $("#hd_iden").val() );
                    $("#vlrFinalMandato").val("");
                    $("#collapse1").removeClass("in");
                    //console.log(s);
                    //console.log(s.length);  
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
    
}

function cargarLibranzasAsociar(){
    
    oTableLibranzasAsociar.clear().draw();
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "opcion" , value: 4 });
   
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
                        oTableLibranzasAsociar.rows.add( s ).draw();    
                    }
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
}

function desasociarLibranza(libranza, mandato, proveed){
    
    var datosEnvio = new Array;
    datosEnvio.push({ name: "opcion" , value: 6 });
    datosEnvio.push({ name: "mandato" , value: mandato });
    datosEnvio.push({ name: "libranza" , value: libranza });
    datosEnvio.push({ name: "proveedor" , value: proveed });
   
        $.ajax({
            url: 'getMandatos.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){             
                if( s != ''){
                    if( s.length >= 1 ){
                        if(s[0]){
                            alert("Libranza desasociada");
                        }
                    }
                }
                listarLibranzas(mandato);
                cargarLibranzasAsociar();
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
}


/** METODOS INICIALES**/

function metodosInicialesLibranzas(){
    $('#tableLibranzasAsociar tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
    
    $('#btnAsociarLibs').click( function () {
        
        var datosEnvio  = new Array;
        var libsAsociar = new Array;
        datosEnvio.push({ name: "mandato" , value: $("#lbl_mandato").val() });
        datosEnvio.push({ name: "opcion" , value: 5 });
        
        /** Recorre las filas seleccionadas y las agrega al array **/
        oTableLibranzasAsociar.rows('.selected').every( function () {
            var d = this.data();           
            libsAsociar.push({ name: "idLibranza" , value: d[0] });
            libsAsociar.push({ name: "idTipoProveedor" , value: d[1] });
            libsAsociar.push({ name: "idProveedor" , value: d[7] });
            
            d.counter++; // update data source for the row
            this.invalidate(); // invalidate the data DataTables has cached for this row
        });
        
        datosEnvio.push({ name: "libranzas" , value: $.param(libsAsociar) });
        
        /** Llama al server para actualizar las libranzas seleccionadas al mandato **/
        $.ajax({
            url: 'getMandatos.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){             
                if( s != ''){
                    console.log(s);
                    console.log(s.length);
                    
                    listarLibranzas( $("#lbl_mandato").val() );
                    cargarLibranzasAsociar();
                    $("#collapLibranza").removeClass("in");
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
        
        
        alert( 'Se han asociado ' + oTableLibranzasAsociar.rows('.selected').data().length +' row(s) selected' );
    } );
}

function metodosInicialesTabs(){
    $('#a_mandatos').attr('class', 'disabled');
    $('#a_libranzas').attr('class', 'disabled');
    $('#a_libranzas').click(function(event){       
        if ($(this).hasClass('disabled')) {
            return false;
        }
        if( $("#lbl_mandato").val() == '' )
            return false;
    });
    $('#a_mandatos').click(function(event){        
        if ($(this).hasClass('disabled')) {
            return false;
        }
    });
    $('#a_clientes').click(function(event){
        $('#infoCliente').hide();
    });
}

function metodosInicialesCliente(){
      $('#jsontable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            
            //capturarColumna( $(this) );
            
            // inhalibita los tabas
            $('#a_mandatos').attr('class', 'disabled');
            $('#a_libranzas').attr('class', 'disabled');
           
        }
        else {
            // si es seleccionado
            oTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            
            //$('.nav-tabs a[href="#mandatos"]').tab('show')
            $('#a_mandatos').attr('class', '');
            $('#a_libranzas').attr('class', '');
            
            //alert( $(this)[0].cells[1].innerHTML + " - " + $(this)[0].cells[0].innerHTML );
            
            if( $(this)[0].cells[0].innerHTML == 'Cedula de Ciudadania' )
                $("#hd_tipo_iden").val( 1 );
            if( $(this)[0].cells[0].innerHTML == 'NIT' )
                $("#hd_tipo_iden").val( 2 );
             if( $(this)[0].cells[0].innerHTML == 'Cedula de Extranjeria' )
                $("#hd_tipo_iden").val( 3 );
            
            $("#hd_iden").val( $(this)[0].cells[1].innerHTML  );
            
            
            /*$("#lbl_lib_tipoIden").val( $(this)[0].cells[0].innerHTML  );
            $("#lbl_lib_nombres").val( $(this)[0].cells[1].innerHTML );
            $("#lbl_lib_apellidos").val( $(this)[0].cells[2].innerHTML + " " + $(this)[0].cells[3].innerHTML );*/

            $("#lbl_man_tipoIden").val( $(this)[0].cells[0].innerHTML  );
            $("#lbl_man_nombres").val( $(this)[0].cells[1].innerHTML );
            $("#lbl_man_apellidos").val( $(this)[0].cells[2].innerHTML + " " + $(this)[0].cells[3].innerHTML );
        }
    } );
}