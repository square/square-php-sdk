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
        $squareVersion = getenv('SQUARE_SQUARE_VERSION');
        $environment = getenv('SQUARE_ENVIRONMENT');
        $customUrl = getenv('SQUARE_CUSTOM_URL');
        $accessToken = getenv('SQUARE_ACCESS_TOKEN');

        if ($timeout !== false && \is_numeric($timeout)) {
            $config['timeout'] = intval($timeout);
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
