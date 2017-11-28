<?php

namespace PostOffice\Core;

/**
 * Application core class
 *
 * @author Milos Stojanovic
 * @version 1.0
 * @namespace PostOffice\Core
 *           
 */
class Application {
	function __construct() {
	}
	public function run() {
		if ($this->isAuthenticated ()) {
			
			$router = new Router ();
			
			$router->handleRequest ();
		} else {
			$this->requestAuthentication ();
		}
	}
	private function isAuthenticated() {
		return false;
	}
	private function requestAuthentication() {
		$auth = new \PostOffice\Controller\AuthenticationController ();
		$auth->index ();
	}
}