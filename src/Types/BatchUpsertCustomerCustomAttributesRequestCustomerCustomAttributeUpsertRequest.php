<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an individual upsert request in a [BulkUpsertCustomerCustomAttributes](api-endpoint:CustomerCustomAttributes-BulkUpsertCustomerCustomAttributes)
 * request. An individual request contains a customer ID, the custom attribute to create or update,
 * and an optional idempotency key.
 */
class BatchUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the target [customer profile](entity:Customer).
     */
    #[JsonProperty('customer_id')]
    private string $customerId;

    /**
     * The custom attribute to create or update, with following fields:
     *
     * - `key`. This key must match the `key` of a custom attribute definition in the Square seller
     * account. If the requesting application is not the definition owner, you must provide the qualified key.
     *
     * - `value`. This value must conform to the `schema` specified by the definition.
     * For more information, see [Value data types](https://developer.squareup.com/docs/customer-custom-attributes-api/custom-attributes#value-data-types).
     *
     * - `version`. To enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control for update operations, include this optional field in the request and set the
     * value to the current version of the custom attribute.
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
     *   customerId: string,
     *   customAttribute: CustomAttribute,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->customAttribute = $values['customAttribute'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
