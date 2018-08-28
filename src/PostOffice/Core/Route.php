<?php
namespace PostOffice\Core;

class Route
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
     * Checks if the given controller exists
     *
     * @return boolean
     */
    public function isValid()
    {
        return file_exists(__DIR__ . "/../Controller/{$this->controllerName}.php");
    }

    /**
     * Returns the controller full name
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Returns the controller function
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
}