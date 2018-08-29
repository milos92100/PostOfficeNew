<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

interface HttpProviderInterface
{

    function getRequestUri(): string;
}