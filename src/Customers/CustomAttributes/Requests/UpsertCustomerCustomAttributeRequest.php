<?php

namespace Square\Customers\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CustomAttribute;
use Square\Core\Json\JsonProperty;

class UpsertCustomerCustomAttributeRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the target [customer profile](entity:Customer).
     */
    private string $customerId;

    /**
     * The key of the custom attribute to create or update. This key must match the `key` of a
     * custom attribute definition in the Square seller account. If the requesting application is not
     * the definition owner, you must use the qualified key.
     *
     * @var string $key
     */
    private string $key;

    /**
     * The custom attribute to create or update, with the following fields:
     *
     * - `value`. This value must conform to the `schema` specified by the definition.
     * For more information, see [Value data types](https://developer.squareup.com/docs/customer-custom-attributes-api/custom-attributes#value-data-types).
     *
     * - `version`. To enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control for an update operation, include this optional field and specify the current version
     * of the custom attribute.
     *
     * @var CustomAttribute $customAttribute
     */
    #[JsonProperty('custom_attribute')]
    private CustomAttribute $customAttribute;

    /**
     * A unique identifier for this request, used to ensure idempotency. For more information,
     * see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @param array{
     *   customerId: string,
     *   key: string,
     *   customAttribute: CustomAttribute,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->key = $values['key'];
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
}
