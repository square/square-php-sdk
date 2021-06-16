<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to link a customer to a gift card
 */
class LinkCustomerToGiftCardRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $customerId;

    /**
     * @param string $customerId
     */
    public function __construct(string $customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Customer Id.
     *
     * The ID of the customer to be linked.
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the customer to be linked.
     *
     * @required
     * @maps customer_id
     */
    public function setCustomerId(string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['customer_id'] = $this->customerId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
