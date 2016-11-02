$(document).ready(function() {
	$.ajax({
		url: './Include/process.php',
		type: 'post',
		data: {tag: 'getData'},
		dataType: 'json',
		success: function(data){
			if(data.success){
				$.each(data, function(index, record){
					if($.isNumeric(index)){
						var row = $("<tr />");
						$("<td />").text(record.Nombre).appendTo(row);
						$("<td />").text(record.Primer_Apellido).appendTo(row);
						$("<td />").text(record.Segundo_Apellido).appendTo(row);
						$("<td />").text(record.Numero_Identificacion).appendTo(row);
						$("<td />").text(record.Fecha_Creacion).appendTo(row);
						//$("<td />").text(record.ruta_docume).appendTo(row);
						$("<td />").html( "<a href="+record.ruta_docume+" > <image src='Image/Documents.ico' height='40' width='40'> </a>" ).appendTo(row);
						row.appendTo("table");
					}
				})
			}

			$('table').dataTable({
				"bJQueryUI": true,
				"sPaginationType":"full_numbers"
				//dom: 'Bfrtip',
				//buttons:['excel']
			})
		}
	});
})