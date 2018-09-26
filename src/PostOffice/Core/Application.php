<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use DI\Container;
use PostOffice\Core\Abstraction\ApplicationInterface;
use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Http\HttpRequest;

/**
 * Application core class
 *
 * @author Milos Stojanovic
 * @version 1.0
 * @namespace PostOffice\Core
 *           
 */
final class Application implements ApplicationInterface
{

    /**
     * Router
     *
     * @var RouterInterface
     */
    private $router = null;

    /**
     * Request
     *
     * @var HttpRequestInterface
     */
    private $request = null;

    /**
     * Constructor
     *
     * @param RouterInterface $router
     */
    function __construct(Container $container)
    {
        $this->router = new Router($container);
    }

    public function run(): void
    {
        $request = new HttpRequest();
        $this->router->handleRequest($request);
    }
}