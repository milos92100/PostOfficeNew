<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\RouteInterface;

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
     *
     * @param string $path
     */
    public function __construct($path)
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
}