$(document).ready(function(){
	llenarSelect();
	$("#boton").on("click",llenarNewSelect);
	$(document).on("change",".select",actualizarOptions);

// }

function actualizarOptions() {
	var selects = $(".select");
	var valores = [];
	for(var i=0;i<selects.length;i++){
		valores.push($(selects[i]).val());
	}
	if(valores.length>1){
		console.log(valores);
		for(var i=0;i<selects.length;i++){
			
		}
	}
	
}

function llenarSelect() {
	var array = "hola";
	var selects = $(".select");
	var html = "<select class='select'>";
	for(var i=0;i<selects.length;i++){
		imprimir = selects[i];
	}
	$.ajax({
		url: 'php/prueba.php',
		type: 'GET',
		success: function(response) {
			array = response.split(",");
			for(var i=0;i<array.length;i++){
				html += "<option>"+array[i]+"</option>";
			}
			html += "</select>";
			$("#selects").append(html);
		} 
	});
}

function llenarNewSelect() {
	var found = false;
	var valores = [];
	var array = "hola";
	var selects = $(".select");
	var html = "<select class='select'>";
	for(var i=0;i<selects.length;i++){
		valores.push($(selects[i]).val());
	}
	$.ajax({
		url: 'php/prueba.php',
		type: 'GET',
		success: function(response) {
			array = response.split(",");
			for(var i=0;i<array.length;i++){
				for(var j=0;j<valores.length;j++){
					if(array[i]!=valores[j])
						found = false;
					else {
						found = true;
						break;
					}
				}
				if(!found)
					html += "<option>"+array[i]+"</option>";
			}
			html += "</select>";
			$("#selects").append(html);
		} 
	});
}