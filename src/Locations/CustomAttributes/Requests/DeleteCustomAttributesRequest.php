<?php

namespace Square\Locations\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the target [location](entity:Location).
     */
    private string $locationId;

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
     *   locationId: string,
     *   key: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->key = $values['key'];
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
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
