<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\WrkFotos;
use app\models\CatMarcos;
use yii\web\NotFoundHttpException;
use app\models\EntUsuarios;
use app\models\Utils;

class SiteController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						'only' => [ 
								'logout' 
						],
						'rules' => [ 
								[ 
										'actions' => [ 
												'logout' 
										],
										'allow' => true,
										'roles' => [ 
												'@' 
										] 
								] 
						] 
				],
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => [ 
								'logout' => [ 
										'post' 
								] 
						] 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],
				'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null 
				] 
		];
	}
	
	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
		$fotografias = WrkFotos::find ()->all ();
		return $this->render ( 'index', [ 
				'fotografias' => $fotografias 
		] );
	}
	
	/**
	 * Se puede seleccionar un marco para la imagen
	 *
	 * @param unknown $token        	
	 */
	public function actionSeleccionarMarco($token = null) {
		$fotografiaSeleccionada = $this->getFotoById ( $token );
		
		$marcos = CatMarcos::find ()->all ();
		
		return $this->render ( 'seleccionarMarco', [ 
				'fotografiaSeleccionada' => $fotografiaSeleccionada,
				'marcos' => $marcos 
		] );
	}
	
	/**
	 */
	public function actionRegistro($fs = null, $ms = null) {
		$fotografiaSeleccionada = $this->getFotoById ( $fs );
		
		$marcoSeleccionado = $this->getMarcoById ( $ms );
		
		$usuario = new EntUsuarios();
		
		if ($usuario->load ( Yii::$app->request->post () )) {
			$usuario->txt_url_image = $this->guardarImagenUsuario($fotografiaSeleccionada, $marcoSeleccionado);
			
			if($usuario->save()){
				$this->goHome();
			}
			
			
		}
		
		return $this->render ( 'registro', [ 
				'usuario' => $usuario 
		] );
	}
	
	private function guardarImagenUsuario($fotografiaSeleccionada, $marcoSeleccionado){
		
		
		list($width_x, $height_x) = getimagesize('uploads/'.$fotografiaSeleccionada->txt_url);
		
		$this->rezisePicture ( 'uploads/'.$fotografiaSeleccionada->txt_url, $width_x, $height_x, 640, 'uploads/re'.$fotografiaSeleccionada->txt_url );
		
		
		$nombreImagenFinal = Utils::generateToken('montaje_').'.png';
		$this->mergeImagen('uploads/re'.$fotografiaSeleccionada->txt_url, 'webAssets/images/marcos/'.$marcoSeleccionado->txt_url, $nombreImagenFinal);
		return $nombreImagenFinal;
	}
	
/**
 * Une 2 imagenes
 * @param string $imageJpg ruta de la imagen 
 * @param string $imagePng ruta de la imagen (con marco)
 */
	private function mergeImagen($imageJpg, $imagePng, $nombreImagenFinal){
	$dest = imagecreatefromjpeg($imageJpg);
	$src = imagecreatefrompng($imagePng);
	
	list($width_x, $height_x) = getimagesize($imageJpg);
	list($width_y, $height_y) = getimagesize($imagePng);
	
	imagecopyresampled($dest, $src, 0, 0, 0, 0, $width_x, $height_x, $width_y, $height_y);
	
	// Usar imagejpg() si el resultado del merge se quiere en jpg
	imagepng($dest, $nombreImagenFinal);
	
	imagedestroy($dest);
	imagedestroy($src);
	
}
	
	/**
	 * Busca foto por id
	 *
	 * @param unknown $id        	
	 * @throws NotFoundHttpException
	 * @return \yii\db\ActiveRecord|NULL
	 */
	private function getFotoById($id) {
		if (($foto = WrkFotos::find ()->where ( [ 
				'id' => $id 
		] )->one ()) !== null) {
			return $foto;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	private function getMarcoById($id) {
		if (($marco = CatMarcos::find ()->where ( [ 
				'id_marco' => $id 
		] )->one ()) !== null) {
			return $marco;
		} else {
			throw new NotFoundHttpException( 'The requested page does not exist.' );
		}
	}
	
	public function actionTest(){
		
		
		$this->rezisePicture ( $dirBase . "/" . $iuf, $width, $height, 1280, $nombreNuevo );
	}
	
	
	/**
	 * Metodo para cambiar el tamaño de una imagen
	 *
	 * @param unknown $file
	 * @param unknown $ancho
	 * @param unknown $alto
	 * @param unknown $nuevo_ancho
	 * @param unknown $nuevo_alto
	 */
	private function rezisePicture($file, $ancho, $alto, $redimencionar, $nombreNuevo) {
		// Factor para el redimensionamiento
		$factor = $this->calcularFactor ( $ancho, $alto, $redimencionar );
	
		$nuevo_ancho = $ancho * $factor;
		$nuevo_alto = $alto * $factor;
	
		// Cargar
		$thumb = imagecreatetruecolor ( $nuevo_ancho, $nuevo_alto );
		$origen = imagecreatefromjpeg ( $file );
		// Cambiar el tamaño
		imagecopyresampled ( $thumb, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto );
		imagejpeg ( $thumb, $nombreNuevo );
	}
	
	/**
	 * Calcula el factor
	 *
	 * @param unknown $ancho
	 * @param unknown $alto
	 * @param unknown $redimension
	 */
	private function calcularFactor($ancho, $alto, $redimension) {
		if ($ancho >= $alto) {
			$factor = $redimension / $ancho;
		} else if ($ancho <= $alto) {
			$factor = $redimension / $alto;
		}
	
		return $factor;
	}
}
