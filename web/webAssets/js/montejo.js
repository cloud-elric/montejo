/**
 * Proyecto
 *
 * # author      Damián <@damian>
 * # copyright   Copyright (c) 2016, Proyecto
 *
 */

/**
 * ----------------------------
 *		Variables
 * ----------------------------
 *
 * - Modal
 *
 */

// Modal
var modal = document.getElementById('modal-aviso-privacidad');
var modalClose = document.getElementById("modal-aviso-privacidad-close");

/**
 * ----------------------------
 *		Document Ready
 * ----------------------------
 *
 * - Animsition
 * - Ladda
 * - Modal
 *
 */
$(document).ready(function(){

	
		 $("#entusuarios-tel_numero_telefonico").keydown(function (e) {
			 validarSoloNumeros(e);
		    });
		 
	
	/**
	 * Deshabilitar
	 */
	$("#registro-btn").prop('disabled', true);

	/**
	 * Animsition
	 */
	$('.animsition').animsition();


	/**
	 * Ladda
	 */
	// registro
//	$('#registro-btn').click(function(e){
//		e.preventDefault();
//		var l = Ladda.create(this);
//		l.start();
//		
//		$('form').submit();
//	});
	// compartir
	$('#compartir-btn').click(function(e){
		e.preventDefault();
		var l = Ladda.create(this);
		//l.start();
		
		
	});

	
	/**
	 * Click - Mostar terminos y condiciones
	 */
	$(".aviso-privacidad-mask").on("click", function(){
		modal.style.display = "flex";
	});

	/**
	 * Click - Boton de Aceptar terminos y condiciones
	 */
	$("#acepto-terminos-condiciones-btn").on("click", function(){
		$(".aviso-privacidad-mask").hide();
		$("#acepta-ap-checkbox").prop( "checked", true );
		$("#registro-btn").prop('disabled', false);
		modal.style.display = "none";

	});

	// Click - Check box
	$("#acepta-ap-checkbox").click(function() {
		if ($("#acepta-ap-checkbox").is(':checked')) {
			$("#registro-btn").prop('disabled', false);
		} else {
			$(".aviso-privacidad-mask").show();
			$("#registro-btn").prop('disabled', true);
		}
	});

	/**
	 * Modal
	 */
	// Close Modal
	$(modalClose).on("click", function(){
		modal.style.display = "none";
	});

	/**
	 * Animación de elementos
	 */
	$(".registro-box .animated").animate({ "opacity" : "0" }, 300, function() {
		$(".registro-box").show();
		$(".registro-box .animated").each(function(index) {
			$(this).addClass("delay-" + (index) + " fadeInUp");
		});
		
	});


}); // end - READY




function validarSoloNumeros(e){
	 // Allow: backspace, delete, tab, escape, enter and .
   if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
        // Allow: Ctrl+A, Command+A
       (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
        // Allow: home, end, left, right, down, up
       (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
   }
   // Ensure that it is a number and stop the keypress
   if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
       e.preventDefault();
   }
}


function registroExitoso(){
	$(".registro-body-form").hide();
	$(".registro-body-succes").show();
}
/**
 * ----------------------------
 *		Click Window
 * ----------------------------
 *
 * - Modal
 *
 */
$(window).onclick = function(event) {
	// Modal - Close
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

$(window).bind("click touchstart", function(){
	// Modal - Close
	if (event.target == modal) {
		modal.style.display = "none";
	}
});


$('body').on(
		'beforeSubmit',
		'#enviar-registro',
		function() {
			var form = $(this);
			// return false if form still have some validation errors
			if (form.find('.has-error').length) {
				return false;
			}
			
			
			
			var button = document.getElementById('registro-btn');
			var l = Ladda.create(button);
			l.start();

			// submit form
			$.ajax({
				url : form.attr('action'),// url para peticion
				type : 'post', // Metodo en el que se enviara la informacion
				data : form.serialize(), // La informacion a mandar
				dataType : 'json', // Tipo de respuesta
				success : function(response) { // Cuando la peticion sea
												// exitosamente se ejecutara la
												// funcion
					// Si la respuesta contiene la propiedad status y es success
					if (response.hasOwnProperty('status')
							&& response.status == 'success') {

						registroExitoso();

					} else {

						// Muestra los errores
						$('#enviar-registro').yiiActiveForm('updateMessages',
								response, true);
					}

					l.stop();
				},
				error:function(){
					l.stop();
				},
				statusCode : {
					404 : function() {
						alert("page not found");
					}
				}

			});
			return false;
		});