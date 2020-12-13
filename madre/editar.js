function editar(dui){
	var nombres = $("#nombres"+dui).val();
	var apellidos = $("#apellidos"+dui).val();
	var nacimiento = $("#nacimiento"+dui).val();
	var profesion = $("#profesion"+dui).val();
	var telefono = $("#telefono"+dui).val();
	var direccion = $("#direccion"+dui).val();
				
	$("#mod_dui").val(dui);
	$("#mod_nombres").val(nombres);
	$("#mod_apellidos").val(apellidos);
	$("#mod_nacimiento").val(nacimiento);
	$("#mod_profesion").val(profesion);
	$("#mod_telefono").val(telefono);
	$("#mod_direccion").val(direccion);
}
