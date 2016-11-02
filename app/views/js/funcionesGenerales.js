/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    //$( "#popup" ).dialog();
});



function capturarColumna(tabla){
    var a = 0;
}

function format(input)
{
    var num = input.value.replace(/\./g,'');
    if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    input.value = num;
    }

    else{ alert('Solo se permiten numeros');
    input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}

/**
 * 
 * Carga los tipos de identificacion en el campo enviado por parametro
 */
function getTiposIdentifica( idCombo ){
    var datosEnvio = new Array;
    datosEnvio.push({ name: "opcion"     ,    value: '2' });
    $.ajax({
            url: 'crearCliente.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){
                //console.log(s);
                if( s != ''){ 
                    if( s.length >= 1 ){
                        for(var i = 0; i < s.length; i++) {
                            $("#" + idCombo).append('<option value="'+s[i][0]+'">'+s[i][1]+'</option>');
                            
                            /*oTableMandato.fnAddData([  s[i][0], 
                                                s[i][1],
                                                s[i][2]
                                            ]);	*/
                        } // End For	
                    }
                }else{
                    alert("Error cargando los tipos de identificacion. Recargue la página nuevamente.");
                }
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
}