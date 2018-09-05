<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\IdentityProviderInterface;

abstract class Controller
{

    protected $identityProvider = null;

    public function __construct(IdentityProviderInterface $identityPovider)
    {
        $this->identityProvider = $identityPovider;
    }

    protected function loadPage(string $page): void
    {
        include_once "./web/page/{$page}.php";
    }

    protected function sendToLogin(): void
    {
        include_once "./web/page/login.php";
    }

    protected function sendNotAuthenticated()
    {
        echo json_encode(array(
            "success" => false,
            "data" => null,
            "Errors" => [
                "Not authenticated"
            ]
        ));
    }
}
