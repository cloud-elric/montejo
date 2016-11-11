<?php
use yii\helpers\Url;
use yii\widgets\ListView;
$this->registerJsFile ( '@web/webAssets/js/selecciona-foto.js', [ 
		'depends' => [ 
				\app\assets\AppAsset::className () 
		] 
] );
/* @var $this yii\web\View */
$this->title = 'Seleccionar foto';
?>
<!-- .animsition -->
<div class="animsition">

	<!-- .wrap -->
	<div class="wrap selecciona-foto" style="background-image: url(<?=Url::base()?>/webAssets/images/b.png); background-position: 50%, 50%; background-size: cover; background-repeat: no-repeat;">
	
		<!-- .carrusel -->
		<div id="demo" class="carrusel">

			<h3>Selecciona tu foto</h3>

			<?php
				$widget = ListView::begin([
						'dataProvider' => $dataProvider,
						'itemView' => '_itemImage',
						'id'=>'selecciona-foto',
						'options'=>['class'=>'owl-carousel'],
						'layout' => "{pager}\n{items}\n{summary}",
				]);
			?>
			
			<?php echo $widget->renderPager(); ?>
			
			<!-- .owl-carousel -->
			<div id="selecciona-foto" class="owl-carousel">
				<?php echo $widget->renderItems(); ?>
			</div>

		</div>
		<!-- end - .carrusel -->

		<!-- Btn - Está me gusta -->
		<button id="selecciona-foto-btn" class="btn btn-primary ladda-button"
			data-style="zoom-out">
			<span class="ladda-label">Esta me gusta</span>
		</button>

	</div>
	<!-- end - .wrap -->

</div>
<!-- end - .animsition -->