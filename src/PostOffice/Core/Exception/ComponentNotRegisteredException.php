<?php
declare(strict_types = 1);
namespace PostOffice\Core\Exception;

/**
 * This exception is thrown when the requested component is not registered in container.
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core exception
 * @namespace PostOffice\Core\Exception
 *           
 */
final class ComponentNotRegisteredException extends \Exception
{

    public function __construct($name)
    {
        parent::__construct("Component: '{$name}' is not registered.");
    }
}