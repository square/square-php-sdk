<?php

declare(strict_types=1);

namespace Square\Http;

/**
 * Represents a single Http Request
 */
class HttpRequest
{
    /**
     * HTTP method as defined in HttpMethod class
     *
     * @var string
     */
    private $httpMethod = null;

    /**
     * Headers
     *
     * @var array
     */
    private $headers = null;

    /**
     * Query url
     *
     * @var string
     */
    private $queryUrl = null;

    /**
     * Input parameters
     *
     * @var array
     */
    private $parameters = null;

    /**
     * Create a new HttpRequest
     *
     * @param string      $httpMethod HTTP method
     * @param array|null  $headers    Map of headers
     * @param string|null $queryUrl   Query url
     * @param array|null  $parameters Map of parameters sent
     */
    public function __construct(
        string $httpMethod,
        array $headers = null,
        ?string $queryUrl = null,
        array $parameters = null
    ) {
        $this->httpMethod = $httpMethod;
        $this->headers = $headers;
        $this->queryUrl = $queryUrl;
        $this->parameters = $parameters;
    }

    /**
     * Get HTTP method
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * Set HTTP method
     *
     * @param string $httpMethod HTTP Method as defined in HttpMethod class
     */
    public function setHttpMethod(string $httpMethod): void
    {
        $this->httpMethod = $httpMethod;
    }

    /**
     * Get headers
     *
     * @return array Map of headers
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Set headers
     *
     * @param array $headers Headers as map
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * Add or replace a single header
     *
     * @param string $key   key for the header
     * @param string $value value of the header
     */
    public function addHeader(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }

    /**
     * Get query url
     *
     * @return string Query url
     */
    public function getQueryUrl(): string
    {
        return $this->queryUrl;
    }

    /**
     * Set query url
     *
     * @param string $queryUrl Query url
     */
    public function setQueryUrl(string $queryUrl): void
    {
        $this->queryUrl = $queryUrl;
    }

    /**
     * Get parameters
     *
     * @return array Map of input parameters
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Set parameters
     *
     * @param array $parameters Map of input parameters
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }
}
