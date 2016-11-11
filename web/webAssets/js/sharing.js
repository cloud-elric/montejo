$(document).ready(function(){
	$('.js-share-facebook').on('click', function() {
		var token = $(this).data('token');
		var name = $(this).data('name');
	    FB.ui({
	        method: 'share_open_graph',
	        action_type: 'og.shares',
	        action_properties: JSON.stringify({
	            object : {
	               'og:url': basePath+'site/ver-imagen?token='+token,
	               'og:title': 'Yucaterco',
	               'og:description': 'Mira mi fotografía',
	               'og:og:image:width': '1280',
	               'og:image:height': '960',
	               'og:image': basePath+'fotosUsuarios/'+name
	            }
	        })
	    });
	  });
});