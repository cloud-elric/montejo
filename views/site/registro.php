<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->registerJsFile ( '@web/webAssets/js/montejo.js', [ 
		'depends' => [ 
				\app\assets\AppAsset::className () 
		] 
] );
?>
<!-- .animsition -->
<div class="animsition">

	<!-- .wrap -->
	<div class="wrap registro">

		<!-- .registro-cont -->
		<div class="registro-cont">

			<div class="registro-box">

				<!-- .registro-header -->
				<div class="registro-header animated">
					<img src="<?=Url::base()?>/webAssets/images/montejo.png"
						alt="Montejo">
				</div>
				<!-- end - .registro-header -->

				<!-- .registro-body -->
				<div class="registro-body">
					<?php

						$form = ActiveForm::begin ( [ 
						'options' => [ 
						'class' => 'registro-body-form' 
						],
						'fieldConfig' => [ 

						'options' => [ 
						'class' => 'registro-body-form-input' 
						] 
						] 
						] );
					?>
						<?=$form->field($usuario, 'txt_nombre')->textInput(['class'=>'animated', 'placeholder'=>'Nombre'])->label(false)?>
						<?=$form->field($usuario, 'txt_apellido')->textInput(['class'=>'animated', 'placeholder'=>'Apellido'])->label(false)?>
						<?=$form->field($usuario, 'tel_numero_telefonico')->textInput(['class'=>'animated', 'placeholder'=>'Teléfono (10 digitos)', 'maxlength'=>10])->label(false)?>
						<?=$form->field($usuario, 'txt_email')->textInput(['class'=>'animated', 'placeholder'=>'Correo eléctronico'])->label(false)?>

						<!-- .aviso-privacidad-cont -->
						<div
							class="aviso-privacidad-cont registro-body-form-input animated">
							<ul class="list">
								<li class="list__item"><label class="label--checkbox">

										<div class="label--checkbox-row">
											<div class="label--checkbox-row-col">
												<input type="checkbox" id="acepta-ap-checkbox"
													class="checkbox">
											</div>
											<div class="label--checkbox-row-col">
												<span>Acepta Terminos y condiciones</span>
											</div>
										</div>
								</label></li>
							</ul>
							<!-- <p>Campo requerido</p> -->
							<div class="aviso-privacidad-mask"></div>
						</div>
						<!-- end - .aviso-privacidad-cont -->

						<!-- Errores -->
	<!-- 					<div class="help-block help-block-error">Otro lindo mensaje de -->
	<!-- 						error</div> -->

						<!-- Btn de Mandar FOTO -->
						<div class="animated">
							<button id="registro-btn" class="btn btn-primary ladda-button"
								data-style="zoom-out">
								<span class="ladda-label">Mandar Foto</span>
							</button>
						</div>

					<?php ActiveForm::end(); ?>


					<!-- .aqua-body-succes -->
					<div class="registro-body-succes">
						<!-- .registro-body-succes-cont -->
						<div class="registro-body-succes-cont">
							<!-- .registro-body-succes-cont -->
							<div class="registro-body-succes-cont-icon animated">
								<i class="ion ion-checkmark"></i>
							</div>
							<!-- end - .registro-body-succes-cont -->
							<p class="animated">Registro Exitoso</p>
						</div>
						<!-- end - .registro-body-succes-cont -->

						<!-- .registro-body-succes-btn -->
						<button class="btn btn-primary registro-body-succes-btn js-btn-continuar ladda-button animated" data-style="zoom-out">
							<span class="ladda-label">Continuar</span>
						</button>
						<!-- end - .registro-body-succes-btn -->
					</div>
					<!-- end - .registro-body-succes -->

				</div>
				<!-- end - .registro-body -->

			</div>

		</div>
		<!-- end - .registro-cont -->

	</div>
	<!-- end - .wrap -->

	<!-- .modal -->
	<div id="modal-aviso-privacidad" class="modal modal-aviso-privacidad">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<span class="close" id="modal-aviso-privacidad-close">×</span>
				<h2>Terminos condiciones</h2>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque
					aliquam, sunt nesciunt aperiam quis, tenetur libero vero fugit
					cupiditate nisi! Delectus quis vel cum explicabo incidunt eius
					rerum enim laborum.</p>

				<button id="acepto-terminos-condiciones-btn"
					class="btn btn-secundary ladda-button" data-style="zoom-out">
					<span class="ladda-label">Acepto los terminos y condiciones</span>
				</button>

			</div>
			<!-- <div class="modal-footer">
						<h3>Modal Footer</h3>
					</div> -->
		</div>

	</div>
	<!-- end - .modal -->


</div>
<!-- end - .animsition -->