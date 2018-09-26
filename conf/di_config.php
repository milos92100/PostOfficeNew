<?php
use function DI\create;
use function DI\get;
use PostOffice\Core\Abstraction\ResourceValidatorInterface;
use PostOffice\Core\Configuration\ResourceMap;
use PostOffice\Core\Configuration\ResourceKeyValue;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Abstraction\TemplateManagerInterface;
use PostOffice\Core\Abstraction\IdentityProviderInterface;

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../web/page/');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__ . "/../cache/templates/",
    'auto_reload' => true
));

return [

    /* Core */
    IdentityProviderInterface::class => get(PostOffice\Core\JwtIdentityProvider::class),
    HttpRequestInterface::class => get(PostOffice\Core\Http\HttpRequest::class),
    TemplateManagerInterface::class => DI\create(PostOffice\Core\TwigTemplateManager::class)->constructor($loader, $twig),
    ResourceValidatorInterface::class => DI\create(PostOffice\Core\ResourceValidator::class)->constructor(new ResourceMap(array(
        new ResourceKeyValue(ResourceMap::CONTROLLERS, __DIR__ . "/../src/PostOffice/Controller/")
    )))
];
