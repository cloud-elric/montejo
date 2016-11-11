<?php
use yii\helpers\Url;
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
	<div class="wrap selecciona-foto">

		<!-- .carrusel -->
		<div id="demo" class="carrusel">

			<h3>Selecciona tu foto</h3>
			<select id="js-time" style="position: absolute; top: 22%;">
			<?php
			
			$start = "00:00";
			$end = "23:30";
			
			$tStart = strtotime ( $start );
			$tEnd = strtotime ( $end );
			$tNow = $tStart;
			$dateOption = 1;
			while ( $tNow <= $tEnd ) {
				$inicio = date ( "H:i", $tNow );
				$tNow = strtotime ( '+30 minutes', $tNow );
				$final = date ( "H:i", $tNow );
				
				echo '<option value="'.$dateOption.'">'.$inicio.' - '.$final.'</option>';
				
				$dateOption++;
			}
			
			?>
			</select>
			<div id="selecciona-foto" class="owl-carousel">
				<?php
				$index = 1;
				foreach ( $fotografias as $fotografia ) {
					?>
				<div data-value="<?=$fotografia->id?>"
					class="item <?=($index==1)?'item-activ':''?>">
					<img src="<?=Url::base()?>/uploads/<?=$fotografia->txt_url?>"
						alt="">
					<!-- <p><i class='ion ion-android-done'></i></p> -->
				</div>
				
				<?php
					$index ++;
				}
				?>
			</div>

		</div>
		<!-- end - .carrusel -->

		<!-- .montejo
		<div class="montejo">
			<img src="<?=Url::base()?>/webAssets/images/montejo.png" alt="Montejo">
		</div>
		end - .montejo -->

		<!-- Btn - Está me gusta -->
		<button id="selecciona-foto-btn" class="btn btn-primary ladda-button"
			data-style="zoom-out">
			<span class="ladda-label">Esta me gusta</span>
		</button>

	</div>
	<!-- end - .wrap -->

</div>
<!-- end - .animsition -->