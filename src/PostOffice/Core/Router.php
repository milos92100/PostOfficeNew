<?php

namespace PostOffice\Core;

class Router {
	public function handleRequest() {
		$route = new Route ( $_SERVER ['REQUEST_URI'] );
		
		if ($route->isValid ()) {
			
			$controller = $route->getController ();
			$action = $route->getAction ();
			
			$instance = new $controller ();
			$instance->$action ();
		} else {
			$this->sendToPageNotFound ();
		}
	}
	private function sendToPageNotFound() {
		echo "Page not found";
	}
}