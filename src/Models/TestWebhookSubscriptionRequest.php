<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Tests a [Subscription]($m/WebhookSubscription) by sending a test event to its notification URL.
 */
class TestWebhookSubscriptionRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $eventType;

    /**
     * Returns Event Type.
     * The event type that will be used to test the [Subscription]($m/WebhookSubscription). The event type
     * must be
     * contained in the list of event types in the [Subscription]($m/WebhookSubscription).
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * Sets Event Type.
     * The event type that will be used to test the [Subscription]($m/WebhookSubscription). The event type
     * must be
     * contained in the list of event types in the [Subscription]($m/WebhookSubscription).
     *
     * @maps event_type
     */
    public function setEventType(?string $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->eventType)) {
            $json['event_type'] = $this->eventType;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
