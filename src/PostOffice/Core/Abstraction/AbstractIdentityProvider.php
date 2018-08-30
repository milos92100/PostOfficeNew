<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

use PostOffice\Core\Http\Abstraction\HttpRequestInterface;

/**
 * AbstractIdentityProvider
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Core\Abstraction
 */
abstract class AbstractIdentityProvider
{

    private $request;

    public function __construct(HttpRequestInterface $request)
    {
        $this->request = $request;
    }
}

