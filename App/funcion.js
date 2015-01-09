var tmp = '';
function guardar () {
	console.log('Guardar');
	var datos = 'accion=guardar&'+$('#resp').serialize();
	var xhr = $.post('./php/operaciones.php',datos);
	xhr.done(function(data){
		console.log(data);
		respuestas();
	})
}
var respuestas = function() {
	var xhr = $.get('./php/operaciones.php?accion=respuestas');
	xhr.done(function(data) {
		$('.respuesta').html('');
		var resp = data.split('<!');
		var json = resp[0];
			json = JSON.parse(json);
			for(var i=0;i<json.length;i++) {
				$('.respuesta').append(tmp(json[i]));				
			}
		acciones();
	})
}
function eliminar(id) {
	var xhr = $.get('./php/operaciones.php',{accion:'borrar_id',usuario:id});
	xhr.done(function(data){
		console.log(data);
		respuestas();
	})
}
respuestas();

$(document).on('ajaxStart',function(){
	console.log('Cargando');
})

$(document).on('ready',function(){
	var boton = document.querySelector('#guardar');
		boton.addEventListener('click',guardar,false);
	var html = $('#plantilla').html();
		tmp  = Handlebars.compile(html);
})

var acciones = function() {
	btnB  = document.querySelector('#eliminar');
	btnB.addEventListener('click',function(){
		var id = this.getAttribute('data-user');
		eliminar(id);
	},false);
}