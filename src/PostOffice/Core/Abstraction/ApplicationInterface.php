<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

/**
 * This interface represents the template for all aplications
 *
 * @author Milos Stojanovic
 * @version 1.0
 * @namespace PostOffice\Core\Abstraction
 * @category Interface
 *          
 */
interface ApplicationInterface
{

    /**
     * This function represents the entry point
     * of the application that implements this interface.
     */
    public function run(): void;
}