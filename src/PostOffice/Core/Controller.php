<?php
declare(strict_types = 1);
namespace PostOffice\Core;

use PostOffice\Core\Abstraction\IdentityProviderInterface;
use PostOffice\Core\Abstraction\TemplateManagerInterface;
use PostOffice\Core\Http\HttpResult;
use PostOffice\Core\Http\HttpStatusCode;
use PostOffice\Core\Http\JsonHttpResponse;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;

/**
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Controller
 * @namespace PostOffice\Core
 */
abstract class Controller
{

    protected $identityProvider = null;

    protected $templateManager = null;

    /**
     * Constructor
     *
     * @param IdentityProviderInterface $identityPovider
     * @param TemplateManagerInterface $templateManager
     */
    public function __construct(IdentityProviderInterface $identityPovider, TemplateManagerInterface $templateManager)
    {
        $this->identityProvider = $identityPovider;
        $this->templateManager = $templateManager;
    }

    /**
     * Constructs a not outhorized response.
     *
     * @param HttpRequestInterface $request
     * @return JsonHttpResponse
     */
    protected function getNotOuthorized(HttpRequestInterface $request): JsonHttpResponse
    {
        $response = new JsonHttpResponse();
        $response->setStatusCode(HttpStatusCode::UNAUTHORIZED);
        $response->setContent(HttpResult::Error(array(
            "Not authorized to access {$request->getRequestUri()}"
        )));
    }
}
