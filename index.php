<?php
include_once "conf/conf.php";

use function DI\create;
use function DI\get;
use DI\ContainerBuilder;
use PostOffice\Core\Abstraction\ApplicationInterface;

$registerConfig = include "conf/di_config.php";

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($registerConfig);
$container = $containerBuilder->build();

$app = $container->get(ApplicationInterface::class);
$app->run();

echo "Hello World";

