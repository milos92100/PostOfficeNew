<?php
declare(strict_types = 1);
namespace PostOffice\Controller;

use PostOffice\Core\Controller;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Http\JsonHttpResponse;
use PostOffice\Core\Http\HttpResult;
use PostOffice\Core\Http\HttpRequest;
use PostOffice\Core\Http\HttpResponse;

/**
 * AuthenticationController
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Controller
 * @namespace PostOffice\Controller;
 */
class AuthenticationController extends Controller
{

    /**
     * Dispalayes the index page
     *
     * @param HttpRequestInterface $request
     * @return HttpRequest
     */
    public function index(HttpRequestInterface $request): HttpRequest
    {
        $response = new HttpResponse();
        $response->setContent($this->templateManager->render("login", array()));
        return $response;
    }

    public function login(HttpRequestInterface $request): JsonHttpResponse
    {
        try {

            if (! $request->hasPost("username")) {
                throw new \Exception("Username is required.");
            }

            if (! $request->hasPost("password")) {
                throw new \Exception("Password is required");
            }

            return new JsonHttpResponse(HttpResult::Success(array(
                "username" => $request->getPost("username"),
                "password" => $request->getPost("password")
            )));

            // some logic
        } catch (\Exception $e) {
            return new JsonHttpResponse(HttpResult::Error($e->getMessage()));
        }
    }
}