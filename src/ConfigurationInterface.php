<?php

declare(strict_types=1);

namespace Square;

/**
 * An interface for all configuration parameters required by the SDK.
 */
interface ConfigurationInterface
{
    /**
     * Get timeout for API calls in seconds.
     */
    public function getTimeout(): int;

    /**
     * Get whether to enable retries and backoff feature.
     */
    public function shouldEnableRetries(): bool;

    /**
     * Get the number of retries to make.
     */
    public function getNumberOfRetries(): int;

    /**
     * Get the retry time interval between the endpoint calls.
     */
    public function getRetryInterval(): float;

    /**
     * Get exponential backoff factor to increase interval between retries.
     */
    public function getBackOffFactor(): float;

    /**
     * Get the maximum wait time in seconds for overall retrying requests.
     */
    public function getMaximumRetryWaitTime(): int;

    /**
     * Get whether to retry on request timeout.
     */
    public function shouldRetryOnTimeout(): bool;

    /**
     * Get http status codes to retry against.
     */
    public function getHttpStatusCodesToRetry(): array;

    /**
     * Get http methods to retry against.
     */
    public function getHttpMethodsToRetry(): array;

    /**
     * Get square Connect API versions
     */
    public function getSquareVersion(): string;

    /**
     * Get additional headers to add to each API call
     */
    public function getAdditionalHeaders(): array;

    /**
     * Get user agent detail, to be appended with user-agent header.
     */
    public function getUserAgentDetail(): string;

    /**
     * Get current API environment
     */
    public function getEnvironment(): string;

    /**
     * Get sets the base URL requests are made to. Defaults to `https://connect.squareup.com`
     */
    public function getCustomUrl(): string;

    /**
     * Get the credentials to use with BearerAuth
     */
    public function getBearerAuthCredentials(): ?BearerAuthCredentials;

    /**
     * Get the base uri for a given server in the current environment.
     *
     * @param string $server Server name
     *
     * @return string Base URI
     */
    public function getBaseUri(string $server = Server::DEFAULT_): string;
}
