<?php

declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\HttpProviderInterface;

class HttpProvider implements HttpProviderInterface
{

    public function getRequestUri(): string
    {
        return "testCtr/testArg";
    }
}
