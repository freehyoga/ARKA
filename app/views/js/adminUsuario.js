$( document ).ready(function() {
    
    // Funcion del boton para guardar los usuarios
    
   $('#btnformUsuario').click(function(){
        
        var datosEnvio = new Array;
        datosEnvio.push({ name: "tipoIdentifica", value: $("#tipoIdentifica option:selected ").val() });
        datosEnvio.push({ name: "numIdentifica" , value: $("#numIdentifica").val() });
        datosEnvio.push({ name: "nombresUsua"   , value: $("#nombresUsua").val() });
        datosEnvio.push({ name: "apellidosUsua" , value: $("#apellidosUsua").val() });
        datosEnvio.push({ name: "password"  ,     value: $("#password").val() });
        datosEnvio.push({ name: "perfil"       , value: $("#perfil option:selected").val() });       
        datosEnvio.push({ name: "opcion" , value: '1' });
        
        $.ajax({
            url: 'operacionesUsuario.php',
            dataType: 'json',
            type: 'POST',
            data: datosEnvio, 
            success: function(s){
                console.log(s.length);
                
                if( s == '' ){
                   $("#resultadoCreacion").html("<p>usuario creado exitosamente</p>"); 
                }
                if( s != '' ){
                   $("#resultadoCreacion").html("<p>El usuario ya existe</p>"); 
                }
                $('#btnNuevoCliente').show();
            }, error: function(e){ 
                console.log(e.responseText);	
            } 
        }); 
    });

    
});

