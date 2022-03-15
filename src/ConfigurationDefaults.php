<?php

declare(strict_types=1);

namespace Square;

/**
 * Default values for the configuration parameters of the client.
 */
class ConfigurationDefaults
{
    public const TIMEOUT = 60;

    public const ENABLE_RETRIES = false;

    public const NUMBER_OF_RETRIES = 0;

    public const RETRY_INTERVAL = 1;

    public const BACK_OFF_FACTOR = 2;

    public const MAXIMUM_RETRY_WAIT_TIME = 0;

    public const RETRY_ON_TIMEOUT = true;

    public const HTTP_STATUS_CODES_TO_RETRY = [408, 413, 429, 500, 502, 503, 504, 521, 522, 524];

    public const HTTP_METHODS_TO_RETRY = ['GET', 'PUT'];

    public const SQUARE_VERSION = '2022-03-16';

    public const ADDITIONAL_HEADERS = [];

    public const USER_AGENT_DETAIL = '';

    public const ENVIRONMENT = Environment::PRODUCTION;

    public const CUSTOM_URL = 'https://connect.squareup.com';

    public const ACCESS_TOKEN = '';
}
