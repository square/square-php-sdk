<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCustomersRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the customer to delete.
     */
    private string $customerId;

    /**
     * The current version of the customer profile.
     *
     * As a best practice, you should include this parameter to enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency) control.  For more information, see [Delete a customer profile](https://developer.squareup.com/docs/customers-api/use-the-api/keep-records#delete-customer-profile).
     *
     * @var ?int $version
     */
    private ?int $version;

    /**
     * @param array{
     *   customerId: string,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->version = $values['version'] ?? null;
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

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }
}
