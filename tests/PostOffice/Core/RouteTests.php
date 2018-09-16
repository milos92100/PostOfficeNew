<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use PostOffice\Core\Exception\RoutePathEmptyException;
use PostOffice\Core\Route;

final class RouteTests extends TestCase
{

    public function testShouldThrowExceptionIfRoutePathIsEmpty()
    {
        $this->expectException(RoutePathEmptyException::class);

        new Route("");
    }

    public function testShouldConstructRouteFromGivenPath()
    {
        $controller = "Foo";
        $action = "bar";
        $givenPath = "{$controller}\\$action";

        $route = new Route($givenPath);

        $this->assertEquals($controller, $route->getControllerName());
        $this->assertEquals($action, $route->getActionName());
    }
}