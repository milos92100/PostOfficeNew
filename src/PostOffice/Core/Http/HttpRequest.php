<?php
namespace PostOffice\Core\Http;

use PostOffice\Core\Http\Abstraction\HttpRequestInterface;

/**
 * HttpRequest
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Http request
 * @namespace PostOffice\Core\Http
 *           
 */
final class HttpRequest implements HttpRequestInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::getRequestUri()
     */
    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::getPost()
     */
    public function getPost($name, $default = null)
    {
        return $this->get($_POST, $name, $default);
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::hasHeader()
     */
    public function hasHeader($name): bool
    {
        return $this->has($_SERVER, $name);
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::hasPost()
     */
    public function hasPost($name): bool
    {
        return $this->has($_POST, $name);
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::getQuery()
     */
    public function getQuery($name, $default = null)
    {
        return $this->get($_GET, $name, $default);
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::hasQuery()
     */
    public function hasQuery($name)
    {
        return $this->has($_GET, $name);
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::getHeader()
     */
    public function getHeader($name, $defualt = null)
    {
        return $this->get($_SERVER, $name, $defualt);
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpRequestInterface::isAjax()
     */
    public function isAjax(): bool
    {
        return 'XMLHttpRequest' == ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
    }

    /**
     * Picks value by name from given source.If not found it returns default.
     *
     * @param array $source
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    private function get(array $source, string $name, $default = null)
    {
        if (isEmpty($source[$name])) {
            return $default;
        }
        return $source[$name];
    }

    /**
     * Checks if value by name exists in given source
     *
     * @param array $source
     * @param string $name
     * @return bool
     */
    private function has($source, $name): bool
    {
        return ! isEmpty($source[$name]);
    }
}
