<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\ApplicationInterface;
use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Abstraction\HttpProviderInterface;

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
     * @var HttpProviderInterface
     */
    private $router = null;

    /**
     * Constructor
     *
     * @param RouterInterface $router
     */
    function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        if ($this->isAuthenticated()) {
            $this->router->handleRequest();
        } else {
            $this->requestAuthentication();
        }
    }

    private function isAuthenticated()
    {
        return true;
    }

    private function requestAuthentication()
    {
        $auth = new \PostOffice\Controller\AuthenticationController();
        $auth->index();
    }
}