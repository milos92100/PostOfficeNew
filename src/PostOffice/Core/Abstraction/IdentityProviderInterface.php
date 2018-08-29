<?php
declare(strict_types = 1);
namespace PostOffice\Core\Abstraction;

/**
 * IdentityProviderInterface
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @namespace PostOffice\Core\Abstraction;
 */
interface IdentityProviderInterface
{

    public function isAuthenticated(): bool;

    public function getIdentityClaims(): array;
}