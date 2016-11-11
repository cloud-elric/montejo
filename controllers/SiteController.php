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
use yii\web\Response;
use yii\data\ActiveDataProvider;

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
	public function actionIndex($page=0) {
		
		$fotografias= WrkFotos::find()->all();
		
		$query = WrkFotos::find();
		
		$order = [
				'fch_recepcion' => 'asc'
		];
		
		// Carga el dataprovider
		$dataProvider = new ActiveDataProvider( [
				'query' => $query,
				'sort' => [
						'defaultOrder' => $order
				],
				'pagination' => [
						'pageSize' => 20,
						'page' => $page
				]
		] );
		
		//return $dataProvider->getModels ();
		
		
		return $this->render ( 'index', [ 
				'fotografias' => $fotografias,
				'dataProvider'=>$dataProvider
		] );
	}
	private function dateSelected($time) {
		switch ($time) {
			case 1 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('00:00') and TIME('00:30')" )->all ();
				break;
			case 2 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('00:30') and TIME('1:00')" )->all ();
				break;
			case 3 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('01:00') and TIME('01:30')" )->all ();
				break;
			case 4 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('01:30') and TIME('02:00')" )->all ();
				break;
			case 5 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('02:00') and TIME('02:30')" )->all ();
				break;
			case 6 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('02:30') and TIME('03:00')" )->all ();
				break;
			case 7 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('03:00') and TIME('03:30')" )->all ();
				break;
			case 8 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('03:30') and TIME('04:00')" )->all ();
				break;
			case 9 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('04:00') and TIME('04:30')" )->all ();
				break;
			case 10 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('04:30') and TIME('05:00')" )->all ();
				break;
			case 11 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('05:00') and TIME('05:30')" )->all ();
				break;
			case 12 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('05:30') and TIME('06:00')" )->all ();
				break;
			case 13 :
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('06:00') and TIME('06:30')" )->all ();
				break;
			case 14:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('06:30') and TIME('07:00')" )->all ();
				break;
			case 15:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('07:00') and TIME('07:30')" )->all ();
				break;
			case 16:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('07:30') and TIME('08:00')" )->all ();
				break;
			case 17:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('08:00') and TIME('08:30')" )->all ();
				break;
			case 18:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('08:30') and TIME('09:00')" )->all ();
				break;
			case 19:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('09:00') and TIME('09:30')" )->all ();
				break;
			case 20:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('09:30') and TIME('10:00')" )->all ();
				break;
			case 21:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('10:00') and TIME('10:30')" )->all ();
				break;
			case 22:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('10:30') and TIME('11:00')" )->all ();
				break;
			case 23:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('11:00') and TIME('11:30')" )->all ();
				break;
			case 24:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('11:30') and TIME('12:00')" )->all ();
				break;
			case 25:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('12:00') and TIME('12:30')" )->all ();
				break;
			case 26:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('12:30') and TIME('13:00')" )->all ();
				break;
			case 27:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('13:00') and TIME('13:30')" )->all ();
				break;
			case 28:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('13:30') and TIME('14:00')" )->all ();
				break;
			case 29:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('14:00') and TIME('14:30')" )->all ();
				break;
			case 30:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('14:30') and TIME('15:00')" )->all ();
				break;
			case 31:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('15:00') and TIME('15:30')" )->all ();
				break;
			case 32:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('15:30') and TIME('16:00')" )->all ();
				break;
			case 33:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('16:00') and TIME('16:30')" )->all ();
				break;
			case 34:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('16:30') and TIME('17:00')" )->all ();
				break;
			case 35:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('17:00') and TIME('17:30')" )->all ();
				break;
			case 36:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('17:30') and TIME('18:00')" )->all ();
				break;
			case 37:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('18:00') and TIME('18:30')" )->all ();
				break;
			case 38:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('18:30') and TIME('19:00')" )->all ();
				break;
			case 39:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('19:00') and TIME('19:30')" )->all ();
				break;
			case 40:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('19:30') and TIME('20:00')" )->all ();
				break;
			case 41:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('20:00') and TIME('20:30')" )->all ();
				break;
			case 42:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('20:30') and TIME('21:00')" )->all ();
				break;
			case 43:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('21:00') and TIME('21:30')" )->all ();
				break;
			case 44:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('21:30') and TIME('22:00')" )->all ();
				break;
			case 45:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('22:00') and TIME('22:30')" )->all ();
				break;
			case 46:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('22:30') and TIME('23:00')" )->all ();
				break;
			case 47:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('23:00') and TIME('23:30')" )->all ();
				break;
			case 48:
				return WrkFotos::find ()->where ( "fch_recepcion >= DATE(NOW()) AND TIME(fch_recepcion) BETWEEN TIME('23:30') and TIME('00:00')" )->all ();
				break;
		}
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
		
		$usuario = new EntUsuarios ();
		
		if ($usuario->load ( Yii::$app->request->post () )) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			$usuario->txt_url_image = $this->guardarImagenUsuario ( $fotografiaSeleccionada, $marcoSeleccionado ) . ".jpg";
			
			if ($usuario->save ()) {
				
				$urlCorta = Yii::$app->urlManager->createAbsoluteUrl ( [ 
						'site/ver-imagen?token=' . $usuario->id_usuario 
				] );
				
				$message = urlencode ( "Puedes ver tu imagen desde aqui: " . $urlCorta );
				$url = 'http://sms-tecnomovil.com/SvtSendSms?username=PIXERED&password=Pakabululu01&message=' . $message . '&numbers=' . $usuario->tel_numero_telefonico;
				
				$sms = file_get_contents ( $url );
				
				return [ 
						'status' => 'success' 
				];
				// $this->goHome();
			}
		}
		
		return $this->render ( 'registro', [ 
				'usuario' => $usuario 
		] );
	}
	private function guardarImagenUsuario($fotografiaSeleccionada, $marcoSeleccionado) {
		
		// list($width_x, $height_x) = getimagesize('uploads/'.$fotografiaSeleccionada->txt_url);
		
		// $this->rezisePicture ( 'uploads/'.$fotografiaSeleccionada->txt_url, $width_x, $height_x, 640, 'uploads/re'.$fotografiaSeleccionada->txt_url );
		$nombreImagenFinal = Utils::generateToken ( 'montaje_' );
		$this->mergeImagen ( 'uploads/' . $fotografiaSeleccionada->txt_url, 'webAssets/images/marcos/' . $marcoSeleccionado->txt_url, $nombreImagenFinal );
		return $nombreImagenFinal;
	}
	private function crearLienzo() {
		return imagecreatetruecolor ( 1280, 960 );
	}
	
	/**
	 * Une 2 imagenes
	 * 
	 * @param string $imageJpg
	 *        	ruta de la imagen
	 * @param string $imagePng
	 *        	ruta de la imagen (con marco)
	 */
	private function mergeImagen($imageJpg, $imagePng, $nombreImagenFinal) {
		$dest = imagecreatefromjpeg ( $imageJpg );
		
		list ( $width_x, $height_x ) = getimagesize ( $imageJpg );
		list ( $width_y, $height_y ) = getimagesize ( $imagePng );
		
		$lienzo = $this->crearLienzo ();
		
		imagecopyresampled ( $lienzo, $dest, 0, 120, 0, 0, $width_x, $height_x, $width_x, $height_x );
		
		// Usar imagejpg() si el resultado del merge se quiere en jpg
		imagejpeg ( $lienzo, 'fotosUsuarios/template' . $nombreImagenFinal . '.jpg' );
		
		$template = imagecreatefromjpeg ( 'fotosUsuarios/template' . $nombreImagenFinal . '.jpg' );
		ini_set ( 'memory_limit', '-1' );
		$src = imagecreatefrompng ( $imagePng );
		imagecopyresampled ( $template, $src, 0, 0, 0, 0, $width_y, $height_y, $width_y, $height_y );
		imagejpeg ( $template, 'fotosUsuarios/' . $nombreImagenFinal . '.jpg' );
		
		imagedestroy ( $dest );
		imagedestroy ( $src );
		imagedestroy ( $template );
		
		unlink ( 'fotosUsuarios/template' . $nombreImagenFinal . '.jpg' );
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
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	public function actionTest() {
		$this->rezisePicture ( 'webAssets/images/marcos/marco-1.png', 1280, 960, 1280, 'marco-1.png' );
		$this->rezisePicture ( 'webAssets/images/marcos/marco-2.png', 1280, 960, 1280, 'marco-2.png' );
		$this->rezisePicture ( 'webAssets/images/marcos/marco-3.png', 1280, 960, 1280, 'marco-3.png' );
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
		$origen = imagecreatefrompng ( $file );
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
	private function getImagenUsuario($token) {
		if (($imagen = EntUsuarios::find ()->where ( [ 
				'id_usuario' => $token 
		] )->one ()) !== null) {
			return $imagen;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	public function actionVerImagen($token = null) {
		$imagen = $this->getImagenUsuario ( $token );
		
		return $this->render ( 'verImagen', [ 
				'imagen' => $imagen 
		] );
	}
	public function actionHome() {
		return $this->goHome ();
	}
}
