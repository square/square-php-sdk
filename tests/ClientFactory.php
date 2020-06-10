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
        $accessToken = getenv('SQUARE_ACCESS_TOKEN');
        $environment = getenv('SQUARE_ENVIRONMENT');
        $baseUrl = getenv('SQUARE_BASE_URL');

        if ($timeout !== false && \is_numeric($timeout)) {
            $config['timeout'] = intval($timeout);
        }

        if ($accessToken !== false) {
            $config['accessToken'] = $accessToken;
        }

        if ($environment !== false) {
            $config['environment'] = $environment;
        }

        if ($baseUrl !== false) {
            $config['baseUrl'] = $baseUrl;
        }

        return $config;
    }
}
