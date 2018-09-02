<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

use PostOffice\Core\Http\Abstraction\HttpRequestInterface;

interface RouterInterface
{

    public function handleRequest(HttpRequestInterface $request): void;
}