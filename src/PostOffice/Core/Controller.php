<?php
declare(strict_types = 1);
namespace PostOffice\Core;

abstract class Controller
{

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
