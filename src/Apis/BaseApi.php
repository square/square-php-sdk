<?php

declare(strict_types=1);

namespace Square\Apis;

use Square\Http\HttpCallBack;
use Square\Http\HttpResponse;
use Square\ConfigurationInterface;
use apimatic\jsonmapper\JsonMapper;

/**
 * Base controller
 */
class BaseApi
{
    /**
     * User-agent to be sent with API calls
     *
     * @var string
     */
    protected const USER_AGENT = 'Square-PHP-SDK/9.0.0.20210226';

    /**
     * HttpCallBack instance associated with this controller
     *
     * @var HttpCallBack|null
     */
    private $httpCallBack = null;

    /**
     * Configuration instance
     *
     * @var ConfigurationInterface
     */
    protected $config;

    /**
     * Constructor that sets the timeout of requests
     */
    protected function __construct(ConfigurationInterface $config, ?HttpCallBack $httpCallBack = null)
    {
        $this->config = $config;

        if (isset($httpCallBack)) {
            $this->httpCallBack = $httpCallBack;
        }
    }

    /**
     * Get HttpCallBack for this controller
     *
     * @return HttpCallBack|null The HttpCallBack object set for this controller
     */
    public function getHttpCallBack(): ?HttpCallBack
    {
        return $this->httpCallBack;
    }

    /**
     * Get a new JsonMapper instance for mapping objects
     *
     * @return \apimatic\jsonmapper\JsonMapper JsonMapper instance
     */
    protected function getJsonMapper(): JsonMapper
    {
        $mapper = new JsonMapper();
        return $mapper;
    }

    /**
     * Is the response valid?
     */
    protected function isValidResponse(HttpResponse $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }
}
