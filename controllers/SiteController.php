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
				//$this->goHome();
			}
			
			
		}
		
		return $this->render ( 'registro', [ 
				'usuario' => $usuario 
		] );
	}
	
	private function guardarImagenUsuario($fotografiaSeleccionada, $marcoSeleccionado){
		
		
// 		list($width_x, $height_x) = getimagesize('uploads/'.$fotografiaSeleccionada->txt_url);
		
// 		$this->rezisePicture ( 'uploads/'.$fotografiaSeleccionada->txt_url, $width_x, $height_x, 640, 'uploads/re'.$fotografiaSeleccionada->txt_url );
		
		
		$nombreImagenFinal = Utils::generateToken('montaje_');
		$this->mergeImagen('uploads/'.$fotografiaSeleccionada->txt_url, 'webAssets/images/marcos/'.$marcoSeleccionado->txt_url, $nombreImagenFinal);
		return $nombreImagenFinal;
	}
	
	private function crearLienzo(){
		return imagecreatetruecolor ( 1280 , 960);
	}
	
/**
 * Une 2 imagenes
 * @param string $imageJpg ruta de la imagen 
 * @param string $imagePng ruta de la imagen (con marco)
 */
	private function mergeImagen($imageJpg, $imagePng, $nombreImagenFinal){
	$dest = imagecreatefromjpeg($imageJpg);
	
	
	list($width_x, $height_x) = getimagesize($imageJpg);
	list($width_y, $height_y) = getimagesize($imagePng);
	
	$lienzo = $this->crearLienzo();
	
	imagecopyresampled($lienzo, $dest, 0, 120, 0, 0, $width_x, $height_x, $width_x, $height_x);
	
	// Usar imagejpg() si el resultado del merge se quiere en jpg
	imagejpeg($lienzo, 'fotosUsuarios/template'.$nombreImagenFinal.'.jpg');
	
	$template = imagecreatefromjpeg('fotosUsuarios/template'.$nombreImagenFinal.'.jpg');
	
	$src = imagecreatefrompng($imagePng);
	echo imagecopyresampled($template, $src, 0, 0, 0, 0, 100, 100, $width_y, $height_y);
	imagejpeg($lienzo, 'fotosUsuarios/'.$nombreImagenFinal.'.jpg');
	
	imagedestroy($dest);
	imagedestroy($src);
	imagedestroy($template);
	
	unlink('fotosUsuarios/template'.$nombreImagenFinal.'.jpg');
	
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
		
		$fotografiaSeleccionada = $this->getFotoById(70);
		$marcoSeleccionado = $this->getMarcoById(1);
		
		
		$this->guardarImagenUsuario($fotografiaSeleccionada, $marcoSeleccionado);
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
