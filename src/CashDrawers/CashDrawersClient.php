<?php

namespace Square\CashDrawers;

use Square\CashDrawers\Shifts\ShiftsClient;
use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;

class CashDrawersClient
{
    /**
     * @var ShiftsClient $shifts
     */
    public ShiftsClient $shifts;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
        $this->shifts = new ShiftsClient($this->client, $this->options);
    }
}
