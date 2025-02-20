<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents one upsert within the bulk operation.
 */
class BulkUpsertOrderCustomAttributesRequestUpsertCustomAttribute extends JsonSerializableType
{
    /**
     * The custom attribute to create or update, with the following fields:
     *
     * - `value`. This value must conform to the `schema` specified by the definition.
     * For more information, see [Value data types](https://developer.squareup.com/docs/customer-custom-attributes-api/custom-attributes#value-data-types).
     *
     * - `version`. To enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control, include this optional field and specify the current version of the custom attribute.
     *
     * @var CustomAttribute $customAttribute
     */
    #[JsonProperty('custom_attribute')]
    private CustomAttribute $customAttribute;

    /**
     * A unique identifier for this request, used to ensure idempotency.
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var string $orderId The ID of the target [order](entity:Order).
     */
    #[JsonProperty('order_id')]
    private string $orderId;

    /**
     * @param array{
     *   customAttribute: CustomAttribute,
     *   orderId: string,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttribute = $values['customAttribute'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->orderId = $values['orderId'];
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
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
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
