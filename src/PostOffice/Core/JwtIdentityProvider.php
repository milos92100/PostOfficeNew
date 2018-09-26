<?php
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\IdentityProviderInterface;
use PostOffice\Core\Abstraction\AbstractIdentityProvider;

/**
 * JwtIdentityProvider
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Core
 *           
 */
final class JwtIdentityProvider extends AbstractIdentityProvider implements IdentityProviderInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\IdentityProviderInterface::isAuthenticated()
     */
    public function isAuthenticated(): bool
    {
        return true;
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\IdentityProviderInterface::getIdentityClaims()
     */
    public function getIdentityClaims(): array
    {
        array();
    }
}

