<?php
declare(strict_types = 1);
namespace PostOffice\Core\Http;

use PostOffice\Core\Http\Abstraction\HttpResponseInterface;

/**
 * HttpResponse
 *
 * @author Aleksandar Petrovic
 * @version 1.0
 * @category Core component
 * @namespace PostOffice\Core\Http
 *           
 */
class HttpResponse implements HttpResponseInterface
{

    /**
     * Constructor
     *
     * @param int $statusCode
     */
    public function __construct(int $statusCode = HttpStatusCode::OK)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Http status code
     *
     * @var int
     */
    protected $statusCode;

    /**
     * Response headers
     *
     * @var array
     */
    protected $headers = array();

    /**
     * Response content
     *
     * @var string
     */
    protected $content = null;

    /**
     * Sets the response content
     *
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * Adds response header
     *
     * @param string $name
     * @param string $value
     */
    public function addHeader(string $name, string $value)
    {
        $this->headers[$name] = $value;
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpResponseInterface::send()
     */
    public function send(): void
    {
        ob_clean();
        $this->applyHeaders();
        http_response_code($this->statusCode);
        echo $this->contento;
    }

    /**
     * Sets the response headers
     */
    protected function applyHeaders(): void
    {
        foreach ($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }
    }
}
