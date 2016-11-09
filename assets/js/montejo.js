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
	$('#registro-btn').click(function(e){
		e.preventDefault();
		var l = Ladda.create(this);
		l.start();
	});
	// compartir
	$('#compartir-btn').click(function(e){
		e.preventDefault();
		var l = Ladda.create(this);
		l.start();
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