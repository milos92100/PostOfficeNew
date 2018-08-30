<?php
declare(strict_types = 1);
namespace PostOffice\Core\Http\Abstraction;

interface HttpRequestInterface
{

    public function getQuery($name, $default = null);

    public function getPost($name, $default = null);

    public function getHeader($name, $defualt = null);

    public function hasHeader($name): bool;

    public function hasPost($name): bool;

    public function hasQuery($name): bool;

    public function getRequestUri(): string;
}