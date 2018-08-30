<?php
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\IdentityProviderInterface;
use PostOffice\Core\Abstraction\AbstractIdentityProvider;

final class JwtIdentityProvider extends AbstractIdentityProvider implements IdentityProviderInterface
{

    public function isAuthenticated()
    {}

    public function getIdentityClaims()
    {}
}

