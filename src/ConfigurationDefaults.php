<?php

declare(strict_types=1);

namespace Square;

/**
 * Default values for the configuration parameters of the client.
 */
class ConfigurationDefaults
{
    public const TIMEOUT = 60;

    public const SQUARE_VERSION = '2021-02-26';

    public const ACCESS_TOKEN = 'TODO: Replace';

    public const ADDITIONAL_HEADERS = [];

    public const ENVIRONMENT = Environment::PRODUCTION;

    public const CUSTOM_URL = 'https://connect.squareup.com';
}
