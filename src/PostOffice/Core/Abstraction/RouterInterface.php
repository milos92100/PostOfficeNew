<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

interface RouterInterface
{

    public function handleRequest(): void;
}