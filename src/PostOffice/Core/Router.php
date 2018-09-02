<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;

/**
 * Application router
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @namespace PostOffice\Core
 *           
 */
class Router implements RouterInterface
{

    public function handleRequest(HttpRequestInterface $request): void
    {
        // $route = new Route ( $_SERVER ['REQUEST_URI'] );
        $route = new Route($request->getRequestUri());

        if ($route->isValid()) {

            $controller = $route->getController();
            $action = $route->getAction();

            $instance = new $controller();
            $instance->$action();
        } else {
            $this->sendToPageNotFound();
        }
    }

    private function sendToPageNotFound(): void
    {
        echo "Page not found: " . $this->httpProvider->getRequestUri();
    }
}