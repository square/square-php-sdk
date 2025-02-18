<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an individual upsert request in a [BulkUpsertMerchantCustomAttributes](api-endpoint:MerchantCustomAttributes-BulkUpsertMerchantCustomAttributes)
 * request. An individual request contains a merchant ID, the custom attribute to create or update,
 * and an optional idempotency key.
 */
class BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest extends JsonSerializableType
{
    /**
     * @var string $merchantId The ID of the target [merchant](entity:Merchant).
     */
    #[JsonProperty('merchant_id')]
    private string $merchantId;

    /**
     * The custom attribute to create or update, with following fields:
     * - `key`. This key must match the `key` of a custom attribute definition in the Square seller
     * account. If the requesting application is not the definition owner, you must provide the qualified key.
     * - `value`. This value must conform to the `schema` specified by the definition.
     * For more information, see [Supported data types](https://developer.squareup.com/docs/devtools/customattributes/overview#supported-data-types).
     * - The version field must match the current version of the custom attribute definition to enable
     * [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * If this is not important for your application, version can be set to -1. For any other values, the request fails with a BAD_REQUEST error.
     *
     * @var CustomAttribute $customAttribute
     */
    #[JsonProperty('custom_attribute')]
    private CustomAttribute $customAttribute;

    /**
     * A unique identifier for this individual upsert request, used to ensure idempotency.
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @param array{
     *   merchantId: string,
     *   customAttribute: CustomAttribute,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->merchantId = $values['merchantId'];
        $this->customAttribute = $values['customAttribute'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
     * @return CustomAttribute
     */
    public function getCustomAttribute(): CustomAttribute
    {
        return $this->customAttribute;
    }

    /**
     * @param CustomAttribute $value
     */
    public function setCustomAttribute(CustomAttribute $value): self
    {
        $this->customAttribute = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
