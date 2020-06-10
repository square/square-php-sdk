<?php

declare(strict_types=1);

namespace Square\Http;

/**
 * Represents an HTTP call in context
 */
class HttpContext
{
    /**
     * Http request sent
     *
     * @var HttpRequest
     */
    private $request = null;

    /**
     * Http response recevied
     *
     * @var HttpResponse
     */
    private $response = null;

    /**
     * Create an instance of HttpContext for an Http Call
     *
     * @param HttpRequest  $request  Request first sent on http call
     * @param HttpResponse $response Response received from http call
     */
    public function __construct(HttpRequest $request, HttpResponse $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Returns the HTTP Request
     *
     * @return HttpRequest request
     */
    public function getRequest(): HttpRequest
    {
        return $this->request;
    }

    /**
     * Returns the HTTP Response
     *
     * @return HttpResponse response
     */
    public function getResponse(): HttpResponse
    {
        return $this->response;
    }
}
