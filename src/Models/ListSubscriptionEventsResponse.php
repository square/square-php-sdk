<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response from the
 * [ListSubscriptionEvents]($e/Subscriptions/ListSubscriptionEvents)
 * endpoint.
 */
class ListSubscriptionEventsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var SubscriptionEvent[]|null
     */
    private $subscriptionEvents;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Errors.
     *
     * Information about errors encountered during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Information about errors encountered during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Subscription Events.
     *
     * The `SubscriptionEvents` retrieved.
     *
     * @return SubscriptionEvent[]|null
     */
    public function getSubscriptionEvents(): ?array
    {
        return $this->subscriptionEvents;
    }

    /**
     * Sets Subscription Events.
     *
     * The `SubscriptionEvents` retrieved.
     *
     * @maps subscription_events
     *
     * @param SubscriptionEvent[]|null $subscriptionEvents
     */
    public function setSubscriptionEvents(?array $subscriptionEvents): void
    {
        $this->subscriptionEvents = $subscriptionEvents;
    }

    /**
     * Returns Cursor.
     *
     * When a response is truncated, it includes a cursor that you can
     * use in a subsequent request to fetch the next set of events.
     * If empty, this is the final response.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * When a response is truncated, it includes a cursor that you can
     * use in a subsequent request to fetch the next set of events.
     * If empty, this is the final response.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']              = $this->errors;
        }
        if (isset($this->subscriptionEvents)) {
            $json['subscription_events'] = $this->subscriptionEvents;
        }
        if (isset($this->cursor)) {
            $json['cursor']              = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
