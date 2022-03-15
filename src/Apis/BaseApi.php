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
     * User-Agent header value to be sent with API calls.
     *
     * @var string
     */
    protected $internalUserAgent;

    private static $userAgent = 'Square-PHP-SDK/17.3.0.20220316 ({api-version}) {engine}/{engine-version} ({os-info}) {detail}';

    /**
     * Constructor that sets the timeout of requests
     */
    protected function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        $this->config = $config;
        $this->authManagers = $authManagers;
        $this->httpCallBack = $httpCallBack;
        $this->updateUserAgent();
        $this->internalUserAgent = str_replace(
            ['{api-version}', '{detail}'],
            [$config->getSquareVersion(), rawurlencode($config->getUserAgentDetail())],
            self::$userAgent
        );

        Request::timeout($config->getTimeout());
        Request::enableRetries($config->shouldEnableRetries());
        Request::maxNumberOfRetries($config->getNumberOfRetries());
        Request::retryInterval($config->getRetryInterval());
        Request::backoffFactor($config->getBackOffFactor());
        Request::maximumRetryWaitTime($config->getMaximumRetryWaitTime());
        Request::retryOnTimeout($config->shouldRetryOnTimeout());
        Request::httpMethodsToRetry($config->getHttpMethodsToRetry());
        Request::httpStatusCodesToRetry($config->getHttpStatusCodesToRetry());
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
