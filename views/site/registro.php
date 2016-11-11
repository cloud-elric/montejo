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
					<!--  <img src="<?=Url::base()?>/webAssets/images/montejo.png"
						alt="Montejo">-->
				</div>
				<!-- end - .registro-header -->

				<!-- .registro-body -->
				<div class="registro-body">
					<?php
					
					$form = ActiveForm::begin ( [ 
							'id' => 'enviar-registro',
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
											<span>He leído el aviso de privacidad</span>
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
						<a
							class="btn btn-primary registro-body-succes-btn js-btn-continuar ladda-button animated"
							data-style="zoom-out" href="home"> <span class="ladda-label">Continuar</span>
						</a>
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
				<h2>Aviso de privacidad</h2>
			</div>
			<div class="modal-body">
				<p>
					Con fundamento en los art&iacute;culos 15 y 16 de la&nbsp;<strong>LEY
						FEDERAL DE PROTECCI&Oacute;N DE DATOS PERSONALES EN
						POSESI&Oacute;N DE PARTICULARES</strong>, hacemos de su
					conocimiento que, PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., con
					domicilio en calle Convento de Santa Brigida #19, Colonia Jardines
					de Santa M&oacute;nica, Tlalnepantla, Estado de M&eacute;xico, c.p.
					54050, es responsable de recabar sus datos personales, del uso que
					se les d&eacute; a los mismos y de su protecci&oacute;n.
				</p>
				<p>
					<br /> Su informaci&oacute;n personal ser&aacute; utilizada para
					las siguientes finalidades: proveer los servicios y productos que
					ha solicitado; notificarle sobre nuevos productos que tengan
					realci&oacute;n con los ya contratados o adquiridos; comunicarle en
					los cambios de los mismos; elaborar estudios y programas que son
					necesarios para determinar h&aacute;bitos de consumo; realizar
					evaluaciones peri&oacute;dicas de nuestros productos y servicios
					para efecto de mejorar la calidad de los mismos; evaluar la calidad
					del servicio que brindamos, y en general&nbsp; para dar
					cumplimiento a las obligaciones que hemos contra&iacute;do para con
					Usted.<br /> Para las finalidades antes mencionadas, en forma
					enunciativa m&aacute;s no limitativa podr&iacute;amos obtener
					alguno de los siguientes datos personales: nombre completo,
					tel&eacute;fono fijo y/o tel&eacute;fono celular, correo
					electr&oacute;nico, direcci&oacute;n de facebook, twiter, y/o
					cualquier otra red social, as&iacute; como domicilio particular y
					de trabajo.
				</p>
				<p>
					<br /> <strong>LIMITACI&Oacute;N DE USO Y </strong><strong>DIVULGACI&Oacute;N</strong>
				</p>
				<p>
					<br /> El tratamiento de sus datos personales ser&aacute; el que
					resulte necesario, adecuado y relevante en relaci&oacute;n con las
					finalidades previstas en esta Pol&iacute;tica de Privacidad.
				</p>
				<p>
					<br /> PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., cumple los
					principios de protecci&oacute;n de datos personales establecidos en
					la Ley Federal de Protecci&oacute;n de Datos Personales en
					Posesi&oacute;n de los Particulares y adopta las medidas necesarias
					para su aplicaci&oacute;n. Lo anterior aplica a&uacute;n y cuando
					estos datos fueren tratados por un tercero, a solicitud de
					PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., y con el fin de cubrir
					los servicios necesarios, manteniendo la confidencialidad en todo
					momento. PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., toma las
					medidas necesarias y suficientes para procurar que esta
					Pol&iacute;tica de Privacidad sea respetada, por &eacute;l o por
					terceros con los que guarde alguna relaci&oacute;n, para otorgar
					los servicios o productos establecidos con el titular.
				</p>
				<p>La obligaci&oacute;n de acceso a la informaci&oacute;n se
					dar&aacute; por cumplida cuando se ponga a disposici&oacute;n del
					titular los datos personales, o bien, mediante la expedici&oacute;n
					de copias simples, documentos electr&oacute;nicos o cualquier otro
					medio que PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., provea al
					titular.</p>
				<p>En el caso de que el titular solicite acceso a los datos a una
					persona que presume es el responsable, y &eacute;sta resulta no
					serlo, bastar&aacute; con que as&iacute; se le indique al titular
					por cualquiera de los medios impresos (carta de procedencia) o
					electr&oacute;nicos (correo electr&oacute;nico, medios
					audiovisuales, etc.), para tener por cumplida la solicitud.&nbsp;</p>
				<p>PUBLICIDAD Y SOLUCIONES GREEN S.A. DE C.V., limitar&aacute; el
					uso de los datos personales sensibles a petici&oacute;n expresa del
					titular, y no estar&aacute; obligada a cancelar los datos
					personales cuando:</p>
				<p>1.Se refiera a las partes de un contrato privado, social,
					administrativo, y sean necesarios para su desarrollo y
					cumplimiento.</p>
				<p>2.Deban ser tratados por disposici&oacute;n legal .</p>
				<p>3.Obstaculice actuaciones judiciales o administrativas vinculadas
					a obligaciones fiscales, la investigaci&oacute;n y
					persecuci&oacute;n de delitos, o la actualizaci&oacute;n de
					sanciones administrativas.</p>
				<p>4.Sean necesarios para proteger los intereses
					jur&iacute;dicamente tutelados del titular.</p>
				<p>5.Sean necesarios para realizar una acci&oacute;n en
					funci&oacute;n del inter&eacute;s p&uacute;blico.</p>
				<p>6.Sean necesarios para cumplir con una obligaci&oacute;n
					legalmente adquirida por el titular, o&hellip;</p>
				<p>7.Sean objeto de tratamiento para la prevenci&oacute;n o el
					diagn&oacute;stico m&eacute;dico o la gesti&oacute;n de servicios
					de salud, siempre que dicho tratamiento se realice por un
					profesional de la salud sujeto a un deber secreto.</p>
				<p>
					Usted tiene derecho de acceder, rectificar y cancelar sus datos
					personales, as&iacute; como de oponerse al tratamiento de los
					mismos o revocar su consentimiento, para lo cual se puede poner en
					contacto directamente a Publicidad y Soluciones Green S.A. de C.V.,
					la cual puede localizar en la direcci&oacute;n ya se&ntilde;alada
					en el primer p&aacute;rrafo de este aviso, o al tel&eacute;fono
					24-87-01-01, y en el correo electr&oacute;nico&nbsp;<a
						href="mailto:info@publicidadgreen.com.mx">info@publicidadgreen.com.mx</a>,
					o bien a trav&eacute;s de un escrito libre acompa&ntilde;ado de una
					copia de su identificaci&oacute;n oficial, y especificando los
					datos personales que quiera proteger, entreg&aacute;ndolo en la
					misma direcci&oacute;n ya citada, PUBLICIDAD Y SOLUCIONES GREEN
					S.A. DE C.V., contar&aacute; con 20 d&iacute;as h&aacute;biles para
					atender su solicitud.
				</p>
				<p>Si usted no manifiesta su oposici&oacute;n para que sus datos
					personales sean transferidos, se entender&aacute; que ha otorgado
					su consentimiento para ello.</p>
				<p>
					<strong>Es importante informarle que Usted tiene derecho al acceso,
						ratificaci&oacute;n, y cancelaci&oacute;n de sus datos personales,
						a oponerse al tratamiento de los mismos o a revocar el
						consentimiento que para dicho fin nos haya otorgado</strong><strong>.</strong>
				</p>
				<p>
					Al aceptar las condiciones y t&eacute;rminos establecidos por medio
					del presente aviso de privacidad se considera otorgado el
					consentimiento expreso para que PUBLICIDAD GREEN, haga uso de
					manejo tratamiento y transferencia de sus datos personales para los
					fines descritos.<br /> <br /> Contacto PUBLICIDAD GREEN:&nbsp;<a
						href="mailto:info@publicidadgreen.com.mx">info@publicidadgreen.com.mx</a>
				</p>

				<button id="acepto-terminos-condiciones-btn"
					class="btn btn-secundary ladda-button" data-style="zoom-out">
					<span class="ladda-label">He leído el aviso de privacidad</span>
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