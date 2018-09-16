<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Exception\ArgumentIsNullException;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Http\Abstraction\HttpResponseInterface;
use PostOffice\Core\Abstraction\ResourceValidatorInterface;
use PostOffice\Core\Http\HttpResult;
use PostOffice\Core\Http\JsonHttpResponse;
use PostOffice\Core\Http\HttpStatusCode;
use PostOffice\Controller\AuthenticationController;
use PostOffice\Core\Abstraction\IdentityProviderInterface;
use PostOffice\Controller\HomeController;
use DI\Container;

/**
 * Application router
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Core
 *           
 */
final class Router implements RouterInterface
{

    private $container = null;

    private $validator = null;

    private $identityProvider = null;

    /**
     * Constructor
     *
     * @param ResourceValidatorInterface $validator
     * @throws \InvalidArgumentException
     */
    public function __construct(Container $container)
    {
        $validator = $container->get(ResourceValidatorInterface::class);
        $identityProvider = $container->get(IdentityProviderInterface::class);

        if ($validator) {
            throw new ArgumentIsNullException(ResourceValidatorInterface::class);
        } else if ($identityProvider) {
            throw new ArgumentIsNullException(IdentityProviderInterface::class);
        }

        $this->validator = $validator;
        $this->identityProvider = $identityProvider;
        $this->container = $container;
    }

    public function handleRequest(HttpRequestInterface $request): void
    {
        $route = new Route($request->getRequestUri());
        if ($route->isActionDefined()) {
            $this->handelUndefinedAction($request);
            return;
        }

        $validationReult = $this->validator->validateRoute($route);

        if ($validationReult->isValid()) {

            $controller = $route->getController();
            $action = $route->getAction();

            $instance = new $controller($this->identityProvider);
            $response = $instance->$action($request);
            $this->dispatch($response);
        } else {
            $this->handleInvalidRequest($request, $validationReult->getErrors());
        }
    }

    private function handelUndefinedAction(HttpRequestInterface $request)
    {
        if ($this->isAuthorized()) {
            $this->sendToHomePage($request);
        } else {
            $this->notAuthorized($request);
        }
    }

    private function notAuthorized(HttpRequestInterface $request)
    {
        if ($request->isAjax()) {
            $response = new JsonHttpResponse();
            $response->setStatusCode(HttpStatusCode::UNAUTHORIZED);
            $response->setContent(HttpResult::Error(array(
                "Not authorized to access {$request->getRequestUri()}"
            )));

            $this->dispatch($response);
        } else {
            $auth = $this->container->get(AuthenticationController::class);
            $auth->index($request);
        }
    }

    private function isAuthorized(): bool
    {
        return true;
    }

    private function dispatch(HttpResponseInterface $response)
    {
        $response->send();
    }

    private function handleInvalidRequest(HttpRequestInterface $request, array $errors)
    {
        if ($request->isAjax()) {
            $response = new JsonHttpResponse();
            $response->setStatusCode(HttpStatusCode::NOT_FOUND);
            $response->setContent(HttpResult::Error($errors));

            $this->dispatch($response);
        } else {
            $this->sendToPageNotFound();
        }
    }

    private function sendToHomePage(HttpRequestInterface $request)
    {
        $auth = $this->container->get(HomeController::class);
        $auth->index($request);
    }

    private function sendToPageNotFound(): void
    {
        echo "Page not found";
    }
}