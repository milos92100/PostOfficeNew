<?php
include "conf/conf.php";

use PostOffice\Core\Application;
use PostOffice\Core\Abstraction\IHttpProvider;
use PostOffice\Core\Abstraction\IRouter;
use PostOffice\Core\Router;

use function DI\create;
use function DI\get;
use DI\ContainerBuilder;

$arr = [
    IHttpProvider::class => get(PostOffice\Core\HttpProvider::class),
    IRouter::class => get(PostOffice\Core\Router::class)
];

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($arr);
$container = $containerBuilder->build();

$router = $container->get(IRouter::class);
$router->handleRequest();

// $app = new Application();

// $app->run();

echo "Hello World";

