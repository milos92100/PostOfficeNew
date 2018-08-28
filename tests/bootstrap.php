<?php
$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';

// Register test classes during runtime.
$autoloader->addPsr4('PostOffice\Tests\\', __DIR__ . '/PostOffice/');