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
	// Selecciona Marco
	$('#selecciona-marco-btn').click(function(e){
		e.preventDefault();
		var l = Ladda.create(this);
		l.start();
	});
	
	/**
	 * Inicializar Carousel
	 */
	// Selecciona tu marco
	$("#selecciona-marco").owlCarousel({
		autoPlay: 4000,
		items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [979,1],
		itemsTablet : [768,1],
		itemsMobile : [479,1]
	});

	/**
	 * Agregar div
	 */
	$(".owl-wrapper-outer").append( '<div class="bg-foto-seleccionada" style="background-image: url(assets/images/foto.jpg)"></div>' );

	/**
	 * Selecciona tu foto
	 */
	$(".item").on("click", function(){

		$(".item").removeClass("item-active");
		$(".item p").remove( "p" );


		$(this).addClass("item-active");
		$(this).append( "<p><i class='ion ion-android-done'></i></p>" );

		$("#selecciona-marco-btn").show();
	});

	// var heightItem = $(".owl-wrapper-outer").height();
	// $(".bg-foto-seleccionada").css("height", heightItem + "px");
	// alert(heightItem);

}); // end - READY