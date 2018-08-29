<?php
use function DI\create;
use function DI\get;
use PostOffice\Core\Abstraction\HttpProviderInterface;
use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Abstraction\ApplicationInterface;

return [

    /* Core */
    HttpProviderInterface::class => get(PostOffice\Core\HttpProvider::class),
    RouterInterface::class => get(PostOffice\Core\Router::class),
    ApplicationInterface::class => get(PostOffice\Core\Application::class)
];
