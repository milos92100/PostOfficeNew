<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

/**
 * ResourceValidatorInterface
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core interface
 * @namespace PostOffice\Core\Abstraction
 */
interface ResourceValidatorInterface
{

    /**
     * Returns array if errors
     *
     * @param RouteInterface $route
     * @return string []
     */
    public function validateRoute(RouteInterface $route): array;
}