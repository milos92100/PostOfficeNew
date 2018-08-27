<?php declare(strict_types=1);

namespace PostOffice\Core\Abstraction;

interface IRouter {

    public function handleRequest(): void;
}