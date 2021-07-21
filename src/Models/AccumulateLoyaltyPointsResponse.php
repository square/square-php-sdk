<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A response containing the resulting loyalty event.
 */
class AccumulateLoyaltyPointsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var LoyaltyEvent|null
     */
    private $event;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
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
     * Any errors that occurred during the request.
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
     * Returns Event.
     *
     * Provides information about a loyalty event.
     * For more information, see [Loyalty events](https://developer.squareup.com/docs/loyalty-
     * api/overview/#loyalty-events).
     */
    public function getEvent(): ?LoyaltyEvent
    {
        return $this->event;
    }

    /**
     * Sets Event.
     *
     * Provides information about a loyalty event.
     * For more information, see [Loyalty events](https://developer.squareup.com/docs/loyalty-
     * api/overview/#loyalty-events).
     *
     * @maps event
     */
    public function setEvent(?LoyaltyEvent $event): void
    {
        $this->event = $event;
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
            $json['errors'] = $this->errors;
        }
        if (isset($this->event)) {
            $json['event']  = $this->event;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
