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
use PostOffice\Core\Exception\ComponentNotRegisteredException;

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
        if (null == $container) {
            throw new ArgumentIsNullException(Container::class);
        }

        $validator = $container->get(ResourceValidatorInterface::class);
        $identityProvider = $container->get(IdentityProviderInterface::class);

        if (null == $validator) {
            throw new ComponentNotRegisteredException(ResourceValidatorInterface::class);
        } else if (null == $identityProvider) {
            throw new ComponentNotRegisteredException(IdentityProviderInterface::class);
        }

        $this->validator = $validator;
        $this->identityProvider = $identityProvider;
        $this->container = $container;
    }

    public function handleRequest(HttpRequestInterface $request): void
    {
        $route = new Route($request->getRequestUri());

        if (false == $route->isActionDefined()) {
            $this->handelUndefinedAction($request);
            return;
        }

        $validationReult = $this->validator->validateRoute($route);

        if ($validationReult->isValid()) {

            $controller = $this->container->get($route->getControllerName());
            if (null == $controller) {
                throw new ComponentNotRegisteredException($route->getControllerName());
            }

            $action = $route->getAction();
            $response = $controller->$action($request);
            $this->dispatch($response);
        } else {
            $this->handleInvalidRequest($request, $validationReult->getErrors());
        }
    }

    /**
     * Handles the request when the action is not defined
     *
     * @param HttpRequestInterface $request
     */
    private function handelUndefinedAction(HttpRequestInterface $request)
    {
        if ($this->isAuthorized()) {
            $this->sendToHomePage($request);
        } else {
            $this->notAuthorized($request);
        }
    }

    /**
     * Creates and dispatches the not outhorized response
     *
     * @param HttpRequestInterface $request
     */
    private function notAuthorized(HttpRequestInterface $request): void
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

    private function dispatch(HttpResponseInterface $response): void
    {
        $response->send();
    }

    /**
     * Handles the request if its not valid
     *
     * @param HttpRequestInterface $request
     * @param array $errors
     */
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
        $response = $auth->index($request);
        $response->send();
    }

    private function sendToPageNotFound(): void
    {
        echo "Page not found";
    }
}