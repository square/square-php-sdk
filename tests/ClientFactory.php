<?php

declare(strict_types=1);

namespace Square\Tests;

class ClientFactory
{
    public static function create(HttpCallBackCatcher $httpCallback): \Square\SquareClient
    {
        return (new \Square\SquareClient(static::getConfigurationFromEnvironment()))
            ->withConfiguration(static::getTestConfiguration($httpCallback));
    }

    public static function getTestConfiguration(HttpCallBackCatcher $httpCallback): array
    {
        return ['httpCallback' => $httpCallback];
    }

    public static function getConfigurationFromEnvironment(): array
    {
        $config = [];
        $timeout = getenv('SQUARE_TIMEOUT');
        $numberOfRetries = getenv('SQUARE_NUMBER_OF_RETRIES');
        $maximumRetryWaitTime = getenv('SQUARE_MAXIMUM_RETRY_WAIT_TIME');
        $squareVersion = getenv('SQUARE_SQUARE_VERSION');
        $environment = getenv('SQUARE_ENVIRONMENT');
        $customUrl = getenv('SQUARE_CUSTOM_URL');
        $accessToken = getenv('SQUARE_ACCESS_TOKEN');

        if ($timeout !== false && \is_numeric($timeout)) {
            $config['timeout'] = intval($timeout);
        }

        if ($numberOfRetries !== false && \is_numeric($numberOfRetries)) {
            $config['numberOfRetries'] = intval($numberOfRetries);
        }

        if ($maximumRetryWaitTime !== false && \is_numeric($maximumRetryWaitTime)) {
            $config['maximumRetryWaitTime'] = intval($maximumRetryWaitTime);
        }

        if ($squareVersion !== false) {
            $config['squareVersion'] = $squareVersion;
        }

        if ($environment !== false) {
            $config['environment'] = $environment;
        }

        if ($customUrl !== false) {
            $config['customUrl'] = $customUrl;
        }

        if ($accessToken !== false) {
            $config['accessToken'] = $accessToken;
        }

        return $config;
    }
}
