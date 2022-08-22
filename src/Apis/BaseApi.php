<?php

declare(strict_types=1);

namespace Square\Apis;

use Square\Http\HttpCallBack;
use Square\Http\HttpResponse;
use Square\ConfigurationInterface;
use Square\AuthManagerInterface;
use Unirest\Request;

/**
 * Base controller
 */
class BaseApi
{
    /**
     * Configuration instance
     *
     * @var ConfigurationInterface
     */
    protected $config;

    /**
     * List of auth managers for this controller.
     *
     * @var array
     */
    private $authManagers = [];

    /**
     * HttpCallBack instance associated with this controller
     *
     * @var HttpCallBack|null
     */
    private $httpCallBack;

    /**
     * UniRest Request instance associated with this controller
     *
     * @var Request|null
     */
    protected static $request;


    /**
     * User-Agent header value to be sent with API calls.
     *
     * @var string
     */
    protected $internalUserAgent;

    private static $userAgent = 'Square-PHP-SDK/21.1.0.20220823 ({api-version}) {engine}/{engine-version} ({os-info}) {detail}';

    /**
     * Constructor that sets the timeout of requests
     */
    protected function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        $this->config = $config;
        $this->authManagers = $authManagers;
        $this->httpCallBack = $httpCallBack;

        if (is_null(self::$request)) {
            self::$request = new Request();
        }

        $this->updateUserAgent();
        $this->internalUserAgent = str_replace(
            ['{api-version}', '{detail}'],
            [$config->getSquareVersion(), rawurlencode($config->getUserAgentDetail())],
            self::$userAgent
        );
        self::$request->timeout($config->getTimeout());
        self::$request->enableRetries($config->shouldEnableRetries());
        self::$request->maxNumberOfRetries($config->getNumberOfRetries());
        self::$request->retryInterval($config->getRetryInterval());
        self::$request->backoffFactor($config->getBackOffFactor());
        self::$request->maximumRetryWaitTime($config->getMaximumRetryWaitTime());
        self::$request->retryOnTimeout($config->shouldRetryOnTimeout());
        self::$request->httpMethodsToRetry($config->getHttpMethodsToRetry());
        self::$request->httpStatusCodesToRetry($config->getHttpStatusCodesToRetry());
    }

    /**
     * Updates the user agent header value.
     */
    private function updateUserAgent(): void
    {
        if (preg_match('({engine}|{engine-version}|{os-info})', self::$userAgent) === 1) {
            $placeHolders = [
                '{engine}' => !empty(zend_version()) ? 'Zend' : '',
                '{engine-version}' => zend_version(),
                '{os-info}' => PHP_OS_FAMILY !== 'Unknown' ? PHP_OS_FAMILY . '-' . php_uname('r') : '',
            ];
            self::$userAgent = str_replace(
                array_keys($placeHolders),
                array_values($placeHolders),
                self::$userAgent
            );
        }
    }

    /**
     * Get auth manager for the provided namespace key.
     *
     * @param  string   $key         Namespace key
     * @return AuthManagerInterface  The AuthManager set for this key.
     */
    protected function getAuthManager(string $key): AuthManagerInterface
    {
        return $this->authManagers[$key];
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
     * Is the response valid?
     */
    protected function isValidResponse(HttpResponse $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }
}
