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

var fotografiaSeleccionada = 0;

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
		
		if(fotografiaSeleccionada==0){
			l.stop();
		}
		
		fotografiaSeleccionada = $('.item.item-active').data('value'); 
		
		window.location = basePath+"site/seleccionar-marco?token="+fotografiaSeleccionada;
		
		//console.log(document.location);
//		console.log("Output;");  
//		console.log(location.hostname);
//		console.log(document.domain);
//		
//
//		console.log("document.URL : "+document.URL);
//		console.log("document.location.href : "+document.location.href);
//		console.log("document.location.origin : "+document.location.origin);
//		console.log("document.location.hostname : "+document.location.hostname);
//		console.log("document.location.host : "+document.location.host);
//		console.log("document.location.pathname : "+document.location.pathname);
		//window.location = "http://www.yoururl.com";
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