<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

final class RouteTests extends TestCase
{

    public function testFoo(): void
    {
        $this->assertEquals("1", "1");
    }
}