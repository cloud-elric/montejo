/**
 * Montejo
 *
 * # author      Damián <@damian>
 * # copyright   Copyright (c) 2016, Montejo
 *
 */

/**
 * ----------------------------
 *		Document Ready
 * ----------------------------
 *
 * - Animsition
 * - Carousel
 * - Selecciona tu foto
 *
 */
$(document).ready(function(){

	/**
	 * Animsition
	 */
	$('.animsition').animsition();

	/**
	 * Ladda
	 */
	// Selecciona Foto
	$('#selecciona-foto-btn').click(function(e){
		e.preventDefault();
		var l = Ladda.create(this);
		l.start();
	});
	
	/**
	 * Inicializar Carousel
	 */
	// Selecciona tu foto
	$("#selecciona-foto").owlCarousel({
		autoPlay: 4000,
		items : 2,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,2],
		itemsTablet : [768,1],
		itemsMobile : [479,1]
	});

	/**
	 * Selecciona tu foto
	 */
	$(".item").on("click", function(){

		$(".item").removeClass("item-active");
		$(".item p").remove( "p" );


		$(this).addClass("item-active");
		$(this).append( "<p><i class='ion ion-android-done'></i></p>" );

		$("#selecciona-foto-btn").show();
	});

}); // end - READY