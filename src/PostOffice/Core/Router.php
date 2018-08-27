<?php declare(strict_types=1);

namespace PostOffice\Core;

use PostOffice\Core\Abstraction\IRouter;
use PostOffice\Core\Abstraction\IHttpProvider;

class Router implements IRouter{

    /**
     * Http provider
     *
     * @var IHttpProvider
     */
    private $httpProvider;

    public function __construct(IHttpProvider $httpProvider){
        $this->httpProvider = $httpProvider;
    }

	public function handleRequest(): void {
        //$route = new Route ( $_SERVER ['REQUEST_URI'] );
        $route = new Route ( $this->httpProvider->getRequestUri());

		if ($route->isValid ()) {

			$controller = $route->getController ();
			$action = $route->getAction ();

			$instance = new $controller ();
			$instance->$action ();
		} else {
			$this->sendToPageNotFound ();
		}
	}
	private function sendToPageNotFound(): void{
		echo "Page not found: " . $this->httpProvider->getRequestUri();
	}
}