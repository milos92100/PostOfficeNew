<?php
use function DI\create;
use function DI\get;
use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Abstraction\ApplicationInterface;
use PostOffice\Core\Abstraction\ResourceValidatorInterface;
use PostOffice\Configuration\ResourceMap;
use PostOffice\Configuration\ResourceKeyValue;

return [

    /* Core */
    RouterInterface::class => get(PostOffice\Core\Router::class),
    ApplicationInterface::class => get(PostOffice\Core\Application::class),
    ResourceValidatorInterface::class => DI\Object(PostOffice\Core\ResourceValidator::class)->constructor(new ResourceMap(array(
        new ResourceKeyValue(ResourceMap::CONTROLLERS, __DIR__ . "/../src/PostOffice/Controller/")
    )))
];
