<?php

declare(strict_types=1);

namespace Square\Tests;

use Core\Types\CallbackCatcher;
use Square\Authentication\BearerAuthCredentialsBuilder;
use Square\SquareClient;
use Square\SquareClientBuilder;

class ClientFactory
{
    public static function create(CallbackCatcher $httpCallback): SquareClient
    {
        $clientBuilder = SquareClientBuilder::init();
        $clientBuilder = self::addConfigurationFromEnvironment($clientBuilder);
        $clientBuilder = self::addTestConfiguration($clientBuilder);
        return $clientBuilder->httpCallback($httpCallback)->build();
    }

    public static function addTestConfiguration(SquareClientBuilder $builder): SquareClientBuilder
    {
        return $builder;
    }

    public static function addConfigurationFromEnvironment(SquareClientBuilder $builder): SquareClientBuilder
    {
        $timeout = getenv('SQUARE_TIMEOUT');
        $numberOfRetries = getenv('SQUARE_NUMBER_OF_RETRIES');
        $maximumRetryWaitTime = getenv('SQUARE_MAXIMUM_RETRY_WAIT_TIME');
        $squareVersion = getenv('SQUARE_SQUARE_VERSION');
        $userAgentDetail = getenv('SQUARE_USER_AGENT_DETAIL');
        $environment = getenv('SQUARE_ENVIRONMENT');
        $customUrl = getenv('SQUARE_CUSTOM_URL');
        $accessToken = getenv('SQUARE_ACCESS_TOKEN');

        if (!empty($timeout) && \is_numeric($timeout)) {
            $builder->timeout(intval($timeout));
        }

        if (!empty($numberOfRetries) && \is_numeric($numberOfRetries)) {
            $builder->numberOfRetries(intval($numberOfRetries));
        }

        if (!empty($maximumRetryWaitTime) && \is_numeric($maximumRetryWaitTime)) {
            $builder->maximumRetryWaitTime(intval($maximumRetryWaitTime));
        }

        if (!empty($squareVersion)) {
            $builder->squareVersion($squareVersion);
        }

        if (!empty($userAgentDetail)) {
            $builder->userAgentDetail($userAgentDetail);
        }

        if (!empty($environment)) {
            $builder->environment($environment);
        }

        if (!empty($customUrl)) {
            $builder->customUrl($customUrl);
        }

        if (!empty($accessToken)) {
            $builder->bearerAuthCredentials(BearerAuthCredentialsBuilder::init($accessToken));
        }

        return $builder;
    }
}
