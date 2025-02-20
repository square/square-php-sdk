<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines output parameters in a response from the
 * [ListSubscriptionEvents](api-endpoint:Subscriptions-ListSubscriptionEvents).
 */
class ListSubscriptionEventsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<SubscriptionEvent> $subscriptionEvents The retrieved subscription events.
     */
    #[JsonProperty('subscription_events'), ArrayType([SubscriptionEvent::class])]
    private ?array $subscriptionEvents;

    /**
     * When the total number of resulting subscription events exceeds the limit of a paged response,
     * the response includes a cursor for you to use in a subsequent request to fetch the next set of events.
     * If the cursor is unset, the response contains the last page of the results.
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
     *   subscriptionEvents?: ?array<SubscriptionEvent>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->subscriptionEvents = $values['subscriptionEvents'] ?? null;
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
     * @return ?array<SubscriptionEvent>
     */
    public function getSubscriptionEvents(): ?array
    {
        return $this->subscriptionEvents;
    }

    /**
     * @param ?array<SubscriptionEvent> $value
     */
    public function setSubscriptionEvents(?array $value = null): self
    {
        $this->subscriptionEvents = $value;
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
