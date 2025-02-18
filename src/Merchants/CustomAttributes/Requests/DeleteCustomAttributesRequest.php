<?php

namespace Square\Merchants\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $merchantId The ID of the target [merchant](entity:Merchant).
     */
    private string $merchantId;

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
     *   merchantId: string,
     *   key: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->merchantId = $values['merchantId'];
        $this->key = $values['key'];
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @param string $value
     */
    public function setMerchantId(string $value): self
    {
        $this->merchantId = $value;
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
