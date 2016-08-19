<?php

class AppController {

	private $parameters;

	public function __construct(){

		$this->_parseUri();

	}
/**
*
* Generates path
*/
	private function _parseUri(){

		$parse_uri = parse_url($_SERVER["REQUEST_URI"]);
		$uri = ltrim($parse_uri["path"], '/');
		$uri = filter_var($uri, FILTER_SANITIZE_STRING);
		$uri = strip_tags($uri);

		$parameters = [];

		if (!empty($uri)) {
			$parameters = explode('/', $uri);
		}

		if (empty($parameters[0])) {
			$parameters[0] = "index";
		}

		$this->parameters = $parameters;
	}


	public function actionIndex(){

		$arr_product = Products::getProduct();
		require_once('app/views/index.php');
	}

	public function getContent(){
		$method_name = "action" . ucfirst($this->parameters[0]);
		if (method_exists($this, $method_name)) {
			$this->$method_name();
		}
	}

}
