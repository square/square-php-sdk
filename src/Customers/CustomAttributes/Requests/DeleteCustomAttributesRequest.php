<?php

namespace Square\Customers\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the target [customer profile](entity:Customer).
     */
    private string $customerId;

    /**
     * The key of the custom attribute to delete. This key must match the `key` of a custom
     * attribute definition in the Square seller account. If the requesting application is not the
     * definition owner, you must use the qualified key.
     *
     * @var string $key
     */
    private string $key;

    /**
     * @param array{
     *   customerId: string,
     *   key: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->key = $values['key'];
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
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $value
     */
    public function setKey(string $value): self
    {
        $this->key = $value;
        return $this;
    }
}
