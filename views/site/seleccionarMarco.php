<?php
use yii\helpers\Url;
use yii\web\View;

$this->registerJsFile ( '@web/webAssets/js/selecciona-marco.js', [
		'depends' => [
				\app\assets\AppAsset::className ()
		]
] );
?>
<!-- .animsition -->
		<div class="animsition">
			
			<!-- .wrap -->
			<div class="wrap selecciona-marco">
				
				<!-- .carrusel -->
				<div id="demo" class="carrusel">
					
					<!-- <h3>Selecciona tu marco</h3> -->

					<div id="selecciona-marco" class="owl-carousel">
					<?php 
					foreach($marcos as $marco){
					?>
						<div class="item" data-value="<?=$marco->id_marco?>"><img src="<?=Url::base()?>/webAssets/images/marcos/<?=$marco->txt_url?>" alt=""></div>
					<?php }?>	
						
					</div>

				</div>
				<!-- end - .carrusel -->
				
				<!-- .montejo -->
				<!-- <div class="montejo">
					<img src="assets/images/montejo.png" alt="Montejo">
				</div> -->
				<!-- end - .montejo -->

				<!-- Btn - Está me gusta -->
				<button id="selecciona-marco-btn" class="btn btn-primary ladda-button" data-style="zoom-out"><span class="ladda-label">Esta me gusta</span></button>

			</div>
			<!-- end - .wrap -->

		</div>
		<!-- end - .animsition -->
		<input type="hidden" id="js-imagen-seleccionada" value="<?=$fotografiaSeleccionada->id?>" />
		<?php 
		$this->registerJs ( "
  		
		$('.owl-wrapper-outer').append( '<div class=\'bg-foto-seleccionada\' style=\'background-image: url(".Url::base()."/uploads/".$fotografiaSeleccionada->txt_url.")\'></div>' );
				
	", View::POS_READY , 'agregarImagenSeleccionada' );
		?>
		
		