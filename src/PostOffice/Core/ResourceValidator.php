<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\ResourceValidatorInterface;
use PostOffice\Core\Abstraction\RouteInterface;
use PostOffice\Core\Configuration\ResourceMap;

/**
 * ResourceValidator
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace namespace PostOffice\Core
 *           
 */
class ResourceValidator implements ResourceValidatorInterface
{

    private $resourceMap = null;

    /**
     * Constructor
     *
     * @param ResourceMap $resourceMap
     * @throws \InvalidArgumentException
     */
    public function __construct(ResourceMap $resourceMap)
    {
        if (null == $resourceMap) {
            throw new \InvalidArgumentException("resourceMap must not be null.");
        }

        $this->resourceMap = $resourceMap;
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\ResourceValidatorInterface::validateRoute()
     */
    public function validateRoute(RouteInterface $route): array
    {
        $errors = array();

        if (false == $this->controllerExists($route->getControllerName())) {
            $errors[] = "Controller {$route->getControllerName()} not found.";
        }

        if (false == $this->actionExists($route->getControllerName(), $route->getActionName())) {
            $errors[] = "Action {$route->getActionName()} does not exists";
        }

        return $errors;
    }

    /**
     * Checks if the given controller action exists.
     *
     * @param string $controller
     * @param string $action
     * @return boolean
     */
    private function actionExists($controller, $action)
    {
        return method_exists($controller, $action);
    }

    /**
     * Checks if the given controller exists
     *
     * @return boolean
     */
    private function controllerExists($name)
    {
        return file_exists("{$this->resourceMap->get(ResourceMap::$CONTROLLERS)}/{$this->controllerName}.php");
    }
}