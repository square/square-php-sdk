<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains the metadata of a webhook event type.
 */
class EventTypeMetadata extends JsonSerializableType
{
    /**
     * @var ?string $eventType The event type.
     */
    #[JsonProperty('event_type')]
    private ?string $eventType;

    /**
     * @var ?string $apiVersionIntroduced The API version at which the event type was introduced.
     */
    #[JsonProperty('api_version_introduced')]
    private ?string $apiVersionIntroduced;

    /**
     * @var ?string $releaseStatus The release status of the event type.
     */
    #[JsonProperty('release_status')]
    private ?string $releaseStatus;

    /**
     * @param array{
     *   eventType?: ?string,
     *   apiVersionIntroduced?: ?string,
     *   releaseStatus?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventType = $values['eventType'] ?? null;
        $this->apiVersionIntroduced = $values['apiVersionIntroduced'] ?? null;
        $this->releaseStatus = $values['releaseStatus'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * @param ?string $value
     */
    public function setEventType(?string $value = null): self
    {
        $this->eventType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApiVersionIntroduced(): ?string
    {
        return $this->apiVersionIntroduced;
    }

    /**
     * @param ?string $value
     */
    public function setApiVersionIntroduced(?string $value = null): self
    {
        $this->apiVersionIntroduced = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReleaseStatus(): ?string
    {
        return $this->releaseStatus;
    }

    /**
     * @param ?string $value
     */
    public function setReleaseStatus(?string $value = null): self
    {
        $this->releaseStatus = $value;
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
