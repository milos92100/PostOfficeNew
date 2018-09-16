<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

interface ContainerManagerInterface
{

    public function has($name);

    public function get($name);
}