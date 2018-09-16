<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

/**
 * RouteInterface
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core interface
 * @namespace PostOffice\Core\Abstraction
 *           
 */
interface RouteInterface
{

    /**
     * Returns the controller class name from the route
     *
     * @return string
     */
    public function getControllerName(): string;

    /**
     * Returns the controller action name from the route
     *
     * @return string
     */
    public function getActionName(): string;

    /**
     * Indicates that the action of the route is defined
     *
     * @return bool
     */
    public function isActionDefined(): bool;
}