<?php
use function DI\create;
use function DI\get;
use PostOffice\Core\Abstraction\RouterInterface;
use PostOffice\Core\Abstraction\ApplicationInterface;
use PostOffice\Core\Abstraction\ResourceValidatorInterface;
use PostOffice\Configuration\ResourceMap;
use PostOffice\Configuration\ResourceKeyValue;
use PostOffice\Core\Abstraction\TemplateManagerInterface;

$loader = new Twig_Loader_Filesystem(__DIR__ . '/web/page/');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__ . "/cache/templates/"
));

return [

    /* Core */
    RouterInterface::class => get(PostOffice\Core\Router::class),
    ApplicationInterface::class => get(PostOffice\Core\Application::class),
    TemplateManagerInterface::class => DI\Object(PostOffice\Core\TwigTemplateManager::class)->constructor($loader, $twig),
    ResourceValidatorInterface::class => DI\Object(PostOffice\Core\ResourceValidator::class)->constructor(new ResourceMap(array(
        new ResourceKeyValue(ResourceMap::CONTROLLERS, __DIR__ . "/../src/PostOffice/Controller/")
    )))
];
