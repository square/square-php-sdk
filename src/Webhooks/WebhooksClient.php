<?php

namespace Square\Webhooks;

use Square\Webhooks\EventTypes\EventTypesClient;
use Square\Webhooks\Subscriptions\SubscriptionsClient;
use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;

class WebhooksClient
{
    /**
     * @var EventTypesClient $eventTypes
     */
    public EventTypesClient $eventTypes;

    /**
     * @var SubscriptionsClient $subscriptions
     */
    public SubscriptionsClient $subscriptions;

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
        $this->eventTypes = new EventTypesClient($this->client, $this->options);
        $this->subscriptions = new SubscriptionsClient($this->client, $this->options);
    }
}
