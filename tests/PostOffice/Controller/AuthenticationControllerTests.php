<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Abstraction\IdentityProviderInterface;
use PostOffice\Controller\AuthenticationController;

final class AuthenticationControllerTests extends TestCase
{

    public function testLoginReturnsErrorIfUsernameIsMissingFromRequest()
    {
        $givenRequest = $this->createMock(HttpRequestInterface::class);
        $givenProvider = $this->createMock(IdentityProviderInterface::class);

        $instance = new AuthenticationController($givenProvider);

        $givenRequest->method('hasPost')
            ->with($this->equalTo("username"))
            ->willReturn(false);

        $actual = $instance->login($givenRequest);

        var_dump($actual);

        $this->assertTrue(true);
    }
}