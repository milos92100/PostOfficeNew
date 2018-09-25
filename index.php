<?php
include_once "conf/conf.php";

use DI\ContainerBuilder;
use PostOffice\Core\Application;

$registerConfig = include __DIR__ . "/conf/di_config.php";

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($registerConfig);
$container = $containerBuilder->build();

$app = new Application($container);
$app->run();

echo "Hello World";

