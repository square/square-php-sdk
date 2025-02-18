<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [SearchEvents](api-endpoint:Events-SearchEvents) endpoint.
 *
 * Note: if there are errors processing the request, the events field will not be
 * present.
 */
class SearchEventsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<Event> $events The list of [Event](entity:Event)s returned by the search.
     */
    #[JsonProperty('events'), ArrayType([Event::class])]
    private ?array $events;

    /**
     * @var ?array<EventMetadata> $metadata Contains the metadata of an event. For more information, see [Event](entity:Event).
     */
    #[JsonProperty('metadata'), ArrayType([EventMetadata::class])]
    private ?array $metadata;

    /**
     * When a response is truncated, it includes a cursor that you can use in a subsequent request to fetch the next set of events. If empty, this is the final response.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   events?: ?array<Event>,
     *   metadata?: ?array<EventMetadata>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
     * @return ?array<Event>
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * @param ?array<Event> $value
     */
    public function setEvents(?array $value = null): self
    {
        $this->events = $value;
        return $this;
    }

    /**
     * @return ?array<EventMetadata>
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param ?array<EventMetadata> $value
     */
    public function setMetadata(?array $value = null): self
    {
        $this->metadata = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
