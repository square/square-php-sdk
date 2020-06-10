<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter events by event type.
 */
class LoyaltyEventTypeFilter implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $types;

    /**
     * @param string[] $types
     */
    public function __construct(array $types)
    {
        $this->types = $types;
    }

    /**
     * Returns Types.
     *
     * The loyalty event types used to filter the result.
     * If multiple values are specified, the endpoint uses a
     * logical OR to combine them.
     * See [LoyaltyEventType](#type-loyaltyeventtype) for possible values
     *
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * Sets Types.
     *
     * The loyalty event types used to filter the result.
     * If multiple values are specified, the endpoint uses a
     * logical OR to combine them.
     * See [LoyaltyEventType](#type-loyaltyeventtype) for possible values
     *
     * @required
     * @maps types
     *
     * @param string[] $types
     */
    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['types'] = $this->types;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
