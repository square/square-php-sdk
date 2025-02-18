<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains metadata about a particular [Event](entity:Event).
 */
class EventMetadata extends JsonSerializableType
{
    /**
     * @var ?string $eventId A unique ID for the event.
     */
    #[JsonProperty('event_id')]
    private ?string $eventId;

    /**
     * @var ?string $apiVersion The API version of the event. This corresponds to the default API version of the developer application at the time when the event was created.
     */
    #[JsonProperty('api_version')]
    private ?string $apiVersion;

    /**
     * @param array{
     *   eventId?: ?string,
     *   apiVersion?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventId = $values['eventId'] ?? null;
        $this->apiVersion = $values['apiVersion'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    /**
     * @param ?string $value
     */
    public function setEventId(?string $value = null): self
    {
        $this->eventId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * @param ?string $value
     */
    public function setApiVersion(?string $value = null): self
    {
        $this->apiVersion = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
