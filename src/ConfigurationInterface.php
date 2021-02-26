<?php

declare(strict_types=1);

namespace Square;

/**
 * An interface for all configuration parameters required by the SDK.
 */
interface ConfigurationInterface
{
    /**
     * Get timeout for API calls
     */
    public function getTimeout(): int;

    /**
     * Get square Connect API versions
     */
    public function getSquareVersion(): string;

    /**
     * Get the OAuth 2.0 Access Token to use for API requests.
     */
    public function getAccessToken(): string;

    /**
     * Get additional headers to add to each API call
     */
    public function getAdditionalHeaders(): array;

    /**
     * Get current API environment
     */
    public function getEnvironment(): string;

    /**
     * Get sets the base URL requests are made to. Defaults to `https://connect.squareup.com`
     */
    public function getCustomUrl(): string;

    /**
     * Get the base uri for a given server in the current environment
     *
     * @param string $server Server name
     *
     * @return string Base URI
     */
    public function getBaseUri(string $server = Server::DEFAULT_): string;
}
