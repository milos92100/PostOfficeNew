<?php
declare(strict_types = 1);
namespace PostOffice\Controller;

use PostOffice\Core\Controller;
use PostOffice\Core\Http\Abstraction\HttpRequestInterface;
use PostOffice\Core\Http\HttpResponse;

/**
 * HomeController
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Controller
 * @namespace PostOffice\Core\Controller
 *           
 */
class HomeController extends Controller
{

    public function index(HttpRequestInterface $request)
    {
        $response = new HttpResponse();
        $response->setContent($this->templateManager->render("home"), array());
        return $response;
    }
}