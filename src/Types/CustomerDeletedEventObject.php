<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the customer associated with the event.
 */
class CustomerDeletedEventObject extends JsonSerializableType
{
    /**
     * @var ?Customer $customer The deleted customer.
     */
    #[JsonProperty('customer')]
    private ?Customer $customer;

    /**
     * @var ?CustomerDeletedEventEventContext $eventContext Information about the change that triggered the event. This field is returned only if the customer is deleted by a merge operation.
     */
    #[JsonProperty('event_context')]
    private ?CustomerDeletedEventEventContext $eventContext;

    /**
     * @param array{
     *   customer?: ?Customer,
     *   eventContext?: ?CustomerDeletedEventEventContext,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customer = $values['customer'] ?? null;
        $this->eventContext = $values['eventContext'] ?? null;
    }

    /**
     * @return ?Customer
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @param ?Customer $value
     */
    public function setCustomer(?Customer $value = null): self
    {
        $this->customer = $value;
        return $this;
    }

    /**
     * @return ?CustomerDeletedEventEventContext
     */
    public function getEventContext(): ?CustomerDeletedEventEventContext
    {
        return $this->eventContext;
    }

    /**
     * @param ?CustomerDeletedEventEventContext $value
     */
    public function setEventContext(?CustomerDeletedEventEventContext $value = null): self
    {
        $this->eventContext = $value;
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
