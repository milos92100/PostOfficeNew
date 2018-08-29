<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Abstraction\HttpProviderInterface;

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

    /**
     * Http provider
     *
     * @var HttpProviderInterface
     */
    private $httpProvider;

    public function __construct(HttpProviderInterface $httpProvider)
    {
        $this->httpProvider = $httpProvider;
    }

    public function handleRequest(): void
    {
        // $route = new Route ( $_SERVER ['REQUEST_URI'] );
        $route = new Route($this->httpProvider->getRequestUri());

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