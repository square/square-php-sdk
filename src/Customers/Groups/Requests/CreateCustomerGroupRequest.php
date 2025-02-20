<?php

namespace Square\Customers\Groups\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CustomerGroup;

class CreateCustomerGroupRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey The idempotency key for the request. For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var CustomerGroup $group The customer group to create.
     */
    #[JsonProperty('group')]
    private CustomerGroup $group;

    /**
     * @param array{
     *   group: CustomerGroup,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->group = $values['group'];
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return CustomerGroup
     */
    public function getGroup(): CustomerGroup
    {
        return $this->group;
    }

    /**
     * @param CustomerGroup $value
     */
    public function setGroup(CustomerGroup $value): self
    {
        $this->group = $value;
        return $this;
    }
}
