<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\ApplicationInterface;
use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Abstraction\IdentityProviderInterface;
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
     * Identity provider
     *
     * @var IdentityProviderInterface
     */
    private $identityProvider = null;

    /**
     * Constructor
     *
     * @param RouterInterface $router
     */
    function __construct(RouterInterface $router)
    {
        $this->router = $router;
        $this->request = $request;
        $this->identityProvider = $identityProvider;
    }

    public function run()
    {
        $request = new HttpRequest();
        $this->router->handleRequest($request);
    }

    private function isAuthenticated()
    {}

    private function requestAuthentication()
    {
        $auth = new \PostOffice\Controller\AuthenticationController();
        $auth->index();
    }
}