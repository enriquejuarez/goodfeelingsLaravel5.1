$(document).on('click touchstart','.salir-modal-contact', function(){
	console.log('222');
	$('.container-contacto').addClass('hidden-class');
});

$(document).on('click touchstart','.opcion-menu.contacto', function(){
	$('.container-contacto').removeClass('hidden-class');
});

$(document).on('click touchstart','.enviar-reserva', function(){
	$('input').val('');
	$('.container-contacto').addClass('hidden-class');
	alert("¡En breve nos contactaremos contigo!");
});

$(document).on('click touchstart','.thumbnail', function(){
	$('#modal-gallery').modal('show');
});


