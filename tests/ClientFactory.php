<?php

declare(strict_types=1);

namespace Square\Tests;

class ClientFactory
{
    public static function create(): \Square\SquareClient
    {
        return (new \Square\SquareClient(static::getConfigurationFromEnvironment()))
            ->withConfiguration(static::getTestConfiguration());
    }

    public static function getTestConfiguration(): array
    {
        return [];
    }

    public static function getConfigurationFromEnvironment(): array
    {
        $config = [];
        $timeout = getenv('SQUARE_TIMEOUT');
        $squareVersion = getenv('SQUARE_SQUARE_VERSION');
        $accessToken = getenv('SQUARE_ACCESS_TOKEN');
        $environment = getenv('SQUARE_ENVIRONMENT');
        $customUrl = getenv('SQUARE_CUSTOM_URL');

        if ($timeout !== false && \is_numeric($timeout)) {
            $config['timeout'] = intval($timeout);
        }

        if ($squareVersion !== false) {
            $config['squareVersion'] = $squareVersion;
        }

        if ($accessToken !== false) {
            $config['accessToken'] = $accessToken;
        }

        if ($environment !== false) {
            $config['environment'] = $environment;
        }

        if ($customUrl !== false) {
            $config['customUrl'] = $customUrl;
        }

        return $config;
    }
}
