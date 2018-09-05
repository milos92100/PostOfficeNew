<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Http\Abstraction\HttpResponseInterface;
use PostOffice\Core\Abstraction\ResourceValidatorInterface;
use PostOffice\Core\Http\HttpResult;
use PostOffice\Core\Http\JsonHttpResponse;

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

    private $validator = null;

    public function __construct(ResourceValidatorInterface $validator)
    {
        if (null == $validator) {
            throw new \InvalidArgumentException(ResourceValidatorInterface::class . " must not be null");
        }
        $this->validator = $validator;
    }

    public function handleRequest(HttpRequestInterface $request): void
    {
        $route = new Route($request->getRequestUri());
        $validationReult = $this->validator->validateRoute($route);

        if ($validationReult->isValid()) {

            $controller = $route->getController();
            $action = $route->getAction();

            $instance = new $controller();
            $response = $instance->$action($request);
            $this->dispatch($response);
        } else {
            $this->handleInvalidRequest($request, $validationReult->getErrors());
        }
    }

    private function dispatch(HttpResponseInterface $response)
    {
        $response->send();
    }

    private function handleInvalidRequest(HttpRequestInterface $request, array $errors)
    {
        if ($request->isAjax()) {
            $response = new JsonHttpResponse();

            $response->setContent(HttpResult::Error($errors));

            $this->dispatch($response);
        } else {
            $this->sendToPageNotFound();
        }
    }

    private function sendToPageNotFound(): void
    {
        echo "Page not found: ";
    }
}