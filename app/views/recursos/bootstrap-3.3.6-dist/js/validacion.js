function valida_envia(){
	//Validar Variables
	var textoAlerta = "";
	var valida = true;
	var prueba;
	//Validaciones Aspirante
	valor = document.getElementById("apellid01_aspi").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		textoAlerta = "El apellido del aspirante debe ser diligenciado";
		//alert('El apellido del aspirante \n debe ser diligenciado');
		valida = false;
	}
	valor = document.getElementById("nombre_aspi").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El nombre del aspirante debe ser diligenciado";
		valida = false;
		
	}
	valor = document.getElementById("genero_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El genero del aspirante debe ser diligenciado";
		valida = false;		
	}

	prueba = document.getElementById("fecha_naci_aspi").value;
	if( prueba == "") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La fecha de nacimiento del aspirante debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("ciudad_naci_aspi").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		//alert(textoAlerta);
		textoAlerta = textoAlerta + "\n" + "La ciudad de nacimiento del aspirante debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("pais_aspi").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" +"El pais de nacimiento del aspirante debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("tipo_docu_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El tipo de documento del aspirante debe ser diligenciado";
		valida = false;		
	}

	valor = document.getElementById("nume_docu_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El numero de documento del aspirante debe ser diligenciado";
		valida = false;		
	}

	valor = document.getElementById("lugar_expe_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El lugar de expedición del aspirante debe ser diligenciado";
		valida = false;		
	}

	prueba = document.getElementById("fecha_expe_aspi").value;
	if( prueba == "") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La fecha de expedición del aspirante debe ser diligenciado";
		valida = false;
	}

	var a = 0, rdbtn=document.getElementsByName("act_eco_aspi");
	for(i=0;i<rdbtn.length;i++) {
		if(rdbtn.item(i).checked == false) {
			a++;
		}
	}
	if(a == rdbtn.length) {
		textoAlerta = textoAlerta + "\n" + "La actividad economica del aspirante debe ser seleccionada";
		valida = false;
	} 
	
	var a = 0, rdbtn=document.getElementsByName("esta_civi_aspi");
	for(i=0;i<rdbtn.length;i++) {
		if(rdbtn.item(i).checked == false) {
			a++;
		}
	}
	if(a == rdbtn.length) {
		textoAlerta = textoAlerta + "\n" + "El estado civil del aspirante debe ser seleccionado";
		valida = false;
	} 
	
	valor = document.getElementById("direccion_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La direccion del aspirante debe ser diligenciada";
		valida = false;		
	}

	valor = document.getElementById("tel_fijo_aspi").value;
	if( valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El telefono fijo del aspirante debe ser diligenciado";
		valida = false;	
	}else if (isNaN(valor)){
		alert("El telefono Fijo del aspirante debe contener solamente numeros!");
		valida = false;	
	}

	valor = document.getElementById("ciudad_resi_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La ciudad de residencia del aspirante debe ser diligenciado";
		valida = false;		
	}

	valor = document.getElementById("correo_aspi").value;
	if( valor == null || valor =="") {
		//alert(textoAlerta);
		textoAlerta = textoAlerta + "\n" + "El correo electronico del aspirante debe ser diligenciado";
		valida = false;		
	}
	valor = document.getElementById("tel_mov_aspi").value;
	//alert("telefono movil" + valor);
	if( valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El telefono movil del aspirante debe ser diligenciado";
		valida = false;	
	}else if (isNaN(valor)){
		alert("El telefono movil del aspirante debe contener solamente numeros!");
		valida = false;	
	}

	valor = document.getElementById("tel_empre_aspi").value;
	//alert("telefono empre" + valor);
	if( valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El telefono empresa del aspirante debe ser diligenciado";
		valida = false;	
	}else if (isNaN(valor)){
		alert("El telefono empresa del aspirante debe contener solamente numeros!");
		valida = false;	
	}

	valor = document.getElementById("nomb_empre_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El nombre de la empresa del aspirante debe ser diligenciado";
		valida = false;		
	}
	valor = document.getElementById("salario_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El salario del aspirante debe ser diligenciado";
		valida = false;		
	}
	valor = document.getElementById("dire_empre_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La direccion de la empresa del aspirante debe ser diligenciado";
		valida = false;		
	}
	valor = document.getElementById("program_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El programa del aspirante debe ser diligenciado";
		valida = false;		
	}
	valor = document.getElementById("nomb_insti_aspi").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El nombre de la institución del aspirante debe ser diligenciado";
		valida = false;		
	}
	
	valor = document.getElementById("dura_prog_aspi").value;
	if( isNaN(valor) || valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "La duracion del programa debe ser diligenciado";
		valida = false;	
	}

	valor = document.getElementById("modu_edu_aspi").value;
	if( valor == null || valor =="") {
		//alert(textoAlerta);
		textoAlerta = textoAlerta + "\n" + "La modalidad educativa debe ser escogida.";
		valida = false;		
	}

	valor = document.getElementById("seme_ingr_aspi").value;
	if( isNaN(valor) || valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El semestre al que ingresa el aspirante debe ser escogido";
		valida = false;	
	}

	//Validaciones Asociado

	valor = document.getElementById("apell_aso").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		textoAlerta = textoAlerta + "\n" + "El apellido del asociado debe ser diligenciado";
		//alert(textoAlerta);
		valida = false;
	}

	valor = document.getElementById("Nomb_aso").value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		textoAlerta = textoAlerta + "\n" + "El nombre del asociado debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("gene_aso").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El genero del asociado debe ser diligenciado";
		//alert(textoAlerta);
		valida = false;		
	}

	prueba = document.getElementById("fecha_naci_aso").value;
	if( prueba == "") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La fecha de nacimiento del asociado debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("ciud_naci_aso").value;
	if( valor == null || valor.length == 0 	 ) {
		textoAlerta =textoAlerta + "\n" + "La ciudad de nacimiento del asociado debe ser diligenciada";
		valida = false;
	}

	valor = document.getElementById("pais_asoc").value;
	if( valor == null || valor.length == 0 ) {
		textoAlerta = textoAlerta + "\n" + "El pais del asociado debe ser diligenciado";
		valida = false;
	}

	prueba = document.getElementById("tipo_docu_aso").value;
	if( prueba == "") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La fecha de nacimiento del asociado debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("nume_docu_asoc").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El numero de documento del asociado debe ser diligenciado";
		valida = false;		
	}
	valor = document.getElementById("luga_expe_asoc").value;
	if( valor == null || valor.length == 0 ) {
		textoAlerta = textoAlerta + "\n" + "El lugar de expedición del asociado debe ser diligenciada";
		valida = false;
	}

	prueba = document.getElementById("fech_expe_asoc").value;
	if( prueba == "") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La fecha de expedición del asociado debe ser diligenciado";
		valida = false;
	}

	var a = 0, rdbtn=document.getElementsByName("acti_eco_aso");
	for(i=0;i<rdbtn.length;i++) {
		if(rdbtn.item(i).checked == false) {
			a++;
		}
	}
	if(a == rdbtn.length) {
		textoAlerta = textoAlerta + "\n" + "La actividad economica del asociado debe ser seleccionada";
		valida = false;
	} 
	
	var a = 0, rdbtn=document.getElementsByName("esta_civil_aso");
	for(i=0;i<rdbtn.length;i++) {
		if(rdbtn.item(i).checked == false) {
			a++;
		}
	}
	if(a == rdbtn.length) {
		textoAlerta = textoAlerta + "\n" + "El estado civil del asociado debe ser seleccionado";
		valida = false;
	} 

	valor = document.getElementById("pers_cargo_aso").value;
	if( isNaN(valor) || valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El numero de personas a cargo del asociado debe ser escogido";
		valida = false;	
	}

	prueba = document.getElementById("si_no_cabe_fami_asoc").value;
	if( prueba == "") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La fecha de nacimiento del asociado debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("ingreso_aso").value;
	if( valor == null || valor.length == 0 ) {
		textoAlerta =textoAlerta + "\n" + "El ingreso del asociado debe ser diligenciado";
		valida = false;
	}

	valor = document.getElementById("ingreso_total_aso").value;
	if( valor == null || valor.length == 0 ) {
		textoAlerta = textoAlerta + "\n" +"El ingreso total del hogar del asociado debe ser diligenciado";
		valida = false;
	}
	
	prueba = document.getElementById("vivienda_aso").value;
	if( prueba == "") {
		textoAlerta = textoAlerta + "\n" + "La vivienda del asociado debe ser diligenciada";
		valida = false;
	}

	valor = document.getElementById("direccion_resi_aso").value;
	if( valor == null || valor =="") {
		//alert(textoAlerta);
		textoAlerta = textoAlerta + "\n" + "La direccion del asociado debe ser diligenciada";
		valida = false;		
	}

	valor = document.getElementById("tel_fijo_aso").value;
	//alert("telefono empre" + valor);
	if( valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El telefono fijo del asociado debe ser diligenciado";
		valida = false;	
	}else if (isNaN(valor)){
		alert("El telefono empresa del asociado debe contener solamente numeros!");
		valida = false;	
	}

	valor = document.getElementById("ciudad_resi_aso").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La ciudad del asociado debe ser diligenciada";
		valida = false;		
	}

	valor = document.getElementById("correo_aso").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El correo electronico del asociado debe ser diligenciado";
		valida = false;		
	}

	valor = document.getElementById("tel_mov_aso").value;
	//alert("telefono empre" + valor);
	if( valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El telefono movil del asociado debe ser diligenciado";
		valida = false;	
	}else if (isNaN(valor)){
		alert("El telefono movil del asociado debe contener solamente numeros!");
		valida = false;	
	}

	valor = document.getElementById("tel_empre_aso").value;
	//alert("telefono empre" + valor);
	if( valor == null || valor == "") {
	  	textoAlerta = textoAlerta + "\n" + "El telefono empresa del asociado debe ser diligenciado";
		valida = false;	
	}else if (isNaN(valor)){
		alert("El telefono empresa del asociado debe contener solamente numeros!");
		valida = false;	
	}

	valor = document.getElementById("correo_empre_aso").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El correo electronico de la empresa del asociado debe ser diligenciado";
		valida = false;		
	}

	valor = document.getElementById("nomb_empre_aso").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El nombre de la empresa del asociado debe ser diligenciado";
		valida = false;		
	}

	valor = document.getElementById("salario_asoc").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "El salario del asociado debe ser diligenciado";
		valida = false;		
	}

	valor = document.getElementById("dire_empre_asoc").value;
	if( valor == null || valor =="") {
		//alert('El nombre del aspirante debe ser diligenciado');
		textoAlerta = textoAlerta + "\n" + "La dirección de la empresa del asociado debe ser diligenciada";
		valida = false;		
	}

	if (!valida){
		alert(textoAlerta);
		return false;
	}else{
		//alert(textoAlerta);
		return true;
	}
		
	
}