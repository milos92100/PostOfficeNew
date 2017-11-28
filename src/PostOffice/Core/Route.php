<?php

namespace PostOffice\Core;

class Route {
	private $controllerName;
	private $controller;
	private $action;
	public function __construct($path) {
		$arr = explode ( "/", $path );
		
		$this->controllerName = $arr [1] . "Controller";
		
		$this->controller = "\\PostOffice\\Controller\\" . $this->controllerName;
		
		if (count ( $arr ) < 3) {
			$this->action = "index";
		} else {
			$this->action = $arr [2];
		}
	}
	public function isValid() {
		return file_exists ( __DIR__ . "/../Controller/{$this->controllerName}.php" );
	}
	public function getController() {
		return $this->controller;
	}
	public function getAction() {
		return $this->action;
	}
}