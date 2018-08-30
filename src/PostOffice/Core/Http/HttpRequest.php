<?php
namespace Core\Http;

use PostOffice\Core\Http\Abstraction\HttpRequestInterface;

class HttpRequest implements HttpRequestInterface
{

    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getPost($name, $default = null)
    {
        if (isEmpty($_POST[$name])) {
            return $default;
        }
        return $_POST[$name];
    }

    public function hasHeader($name)
    {
        return ! isEmpty($_SERVER[$name]);
    }

    public function hasPost($name)
    {}

    public function getQuery($name, $default = null)
    {}

    public function hasQuery($name)
    {}

    public function getHeader($name, $defualt = null)
    {}
}

