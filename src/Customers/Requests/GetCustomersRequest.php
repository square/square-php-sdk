<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;

class GetCustomersRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the customer to retrieve.
     */
    private string $customerId;

    /**
     * @param array{
     *   customerId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
    }

    /**
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $value
     */
    public function setCustomerId(string $value): self
    {
        $this->customerId = $value;
        return $this;
    }
}
