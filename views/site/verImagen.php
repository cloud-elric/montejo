<?php
use yii\helpers\Url;

$this->registerJsFile ( '@web/webAssets/js/montejo.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );

$this->registerJsFile ( '@web/webAssets/js/sharing.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );
?>
<!-- .animsition -->
<div class="animsition">

	<!-- .wrap -->
	<div class="wrap compartir">

		<!-- .compartir-cont -->
		<div class="compartir-cont">

			<!-- .compartir-marco -->
			<!-- <div class="compartir-marco">
						<img src="assets/images/marco.png" alt="Marco">
					</div> -->
			<!-- end - .compartir-marco -->

			<!-- .compartir-foto -->
			<div class="compartir-foto"
				style="background-image: url(<?=Url::base()?>/fotosUsuarios/<?=$imagen->txt_url_image?>)">
				<!-- <img src="assets/images/foto.jpg" alt="Foto"> -->
			</div>
			<!-- end - .compartir-foto -->

			<!-- btn -->
			<button id="compartir-btn" class="btn btn-primary ladda-button js-share-facebook" data-token='<?=$imagen->id_usuario?>'
				data-style="zoom-out" data-name="<?=$imagen->txt_url_image?>">
				<span class="ladda-label"><i class="ion ion-social-facebook"></i>
					Compartir</span>
			</button>

		</div>
		<!-- end - .compartir-cont -->

	</div>
	<!-- end - .wrap -->


</div>
<!-- end - .animsition -->

<script>
window.fbAsyncInit = function() {
	  FB.init({
	    appId      : '1828275510752557',
	    xfbml      : true,
	    version    : 'v2.4'
	  });
	};

	(function(d, s, id){
	   var js, fjs = d.getElementsByTagName(s)[0];
	   if (d.getElementById(id)) {return;}
	   js = d.createElement(s); js.id = id;
	   js.src = "//connect.facebook.net/en_US/sdk.js";
	   fjs.parentNode.insertBefore(js, fjs);
	 }(document, 'script', 'facebook-jssdk'));
</script>