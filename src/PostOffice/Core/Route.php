<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\RouteInterface;

/**
 * Route
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Core
 */
class Route implements RouteInterface
{

    /**
     * Controller name
     *
     * @var string
     */
    private $controllerName;

    /**
     * Full namespace with name
     *
     * @var string
     */
    private $controller;

    /**
     * Controller function name
     *
     * @var string
     */
    private $action;

    /**
     * Constructor
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        if (isEmpty($path)) {
            throw new \InvalidArgumentException("Route path must not be empty.");
        }

        $this->constructRoute($path);
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\RouteInterface::getControllerName()
     */
    public function getControllerName(): string
    {
        return $this->controller;
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\RouteInterface::getActionName()
     */
    public function getActionName(): string
    {
        return $this->action;
    }

    private function constructRoute(string $path)
    {
        $arr = explode("/", $path);

        $this->controllerName = $arr[1] . "Controller";

        $this->controller = "\\PostOffice\\Controller\\" . $this->controllerName;

        if (count($arr) < 3) {
            $this->action = "index";
        } else {
            $this->action = $arr[2];
        }
    }
}