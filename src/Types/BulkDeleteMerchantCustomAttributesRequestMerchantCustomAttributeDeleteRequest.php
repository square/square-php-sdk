<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an individual delete request in a [BulkDeleteMerchantCustomAttributes](api-endpoint:MerchantCustomAttributes-BulkDeleteMerchantCustomAttributes)
 * request. An individual request contains an optional ID of the associated custom attribute definition
 * and optional key of the associated custom attribute definition.
 */
class BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest extends JsonSerializableType
{
    /**
     * The key of the associated custom attribute definition.
     * Represented as a qualified key if the requesting app is not the definition owner.
     *
     * @var ?string $key
     */
    #[JsonProperty('key')]
    private ?string $key;

    /**
     * @param array{
     *   key?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->key = $values['key'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param ?string $value
     */
    public function setKey(?string $value = null): self
    {
        $this->key = $value;
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
