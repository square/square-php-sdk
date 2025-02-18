<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [ListEventTypes](api-endpoint:Events-ListEventTypes) endpoint.
 *
 * Note: if there are errors processing the request, the event types field will not be
 * present.
 */
class ListEventTypesResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<string> $eventTypes The list of event types.
     */
    #[JsonProperty('event_types'), ArrayType(['string'])]
    private ?array $eventTypes;

    /**
     * @var ?array<EventTypeMetadata> $metadata Contains the metadata of an event type. For more information, see [EventTypeMetadata](entity:EventTypeMetadata).
     */
    #[JsonProperty('metadata'), ArrayType([EventTypeMetadata::class])]
    private ?array $metadata;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   eventTypes?: ?array<string>,
     *   metadata?: ?array<EventTypeMetadata>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->eventTypes = $values['eventTypes'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getEventTypes(): ?array
    {
        return $this->eventTypes;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEventTypes(?array $value = null): self
    {
        $this->eventTypes = $value;
        return $this;
    }

    /**
     * @return ?array<EventTypeMetadata>
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param ?array<EventTypeMetadata> $value
     */
    public function setMetadata(?array $value = null): self
    {
        $this->metadata = $value;
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
