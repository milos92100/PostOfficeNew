<?php
declare(strict_types = 1);
namespace PostOffice\Core\Http\Abstraction;

/**
 * HttpResponseInterface
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core interface
 * @namespace PostOffice\Core\Http\Abstraction
 *           
 */
interface HttpResponseInterface
{

    /**
     * Sends the constructed http response
     */
    public function send(): void;
}