<?php

namespace app\models;

class Utils {
	
	/**
	 * Recupera el id de un video de youtube a partir de la url de youtube
	 *
	 * @param unknown $url        	
	 */
	public static function getIdVideoYoutube($url) {
		parse_str ( parse_url ( $url, PHP_URL_QUERY ), $params );
		
		if (key_exists ( 'v', $params )) {
			return $params ['v'];
		}
		
		return null;
	}
	
	/**
	 * Corta un texto y le coloca 3 puntos suspensivos al final
	 *
	 * @param unknown $string        	
	 * @param unknown $lenght        	
	 * @param number $start        	
	 * @return string|unknown
	 */
	public static function subStrTexto($string, $lenght, $start = 0) {
		$cadenaNueva = $string;
		if (strlen ( $string ) > $lenght) {
			$cadenaNueva = substr ( $string, $start, $lenght ) . '...';
		}
		return $cadenaNueva;
	}
	
	/**
	 * Cambia el formato de la fecha
	 *
	 * @param unknown $string        	
	 */
	public static function changeFormatDate($string) {
		$date = date_create ( $string );
		return date_format ( $date, "d-M-Y" );
	}
	
	/**
	 * Cambia el formato de la fecha del input al adecuado para la base de datos
	 * 
	 * @param unknown $string        	
	 */
	public static function changeFormatDateInput($string) {
		$date = date_create ( $string );
		return date_format ( $date, "Y-m-d H:i:s" );
	}
	
	/**
	 * Obtenemos la fecha actual para almacenarla
	 *
	 * @return string
	 */
	public static function getFechaActual() {
		
		// Inicializamos la fecha y hora actual
		$fecha = date ( 'Y-m-d H:i:s', time () );
		return $fecha;
	}
	
	/**
	 * Genera un token para guardarlo en la base de datos
	 *
	 * @param string $pre        	
	 * @return string
	 */
	public static function generateToken($pre = 'tok') {
		$token = $pre . md5 ( uniqid ( $pre ) ) . uniqid ();
		return $token;
	}
}