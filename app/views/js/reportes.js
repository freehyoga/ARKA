$(document).ready(function() {
    
    $('#btnGeneraRepor').click(function(){      
        verReporte();
    });
    
} );


function verReporte(){
    var idReport = $("#listaReport option:selected").val();
    
    alert(idReport);
    
}
