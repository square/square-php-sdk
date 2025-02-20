<?php

namespace Square\Locations\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CustomAttribute;
use Square\Core\Json\JsonProperty;

class UpsertLocationCustomAttributeRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the target [location](entity:Location).
     */
    private string $locationId;

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
     * - `value`. This value must conform to the `schema` specified by the definition.
     * For more information, see [Supported data types](https://developer.squareup.com/docs/devtools/customattributes/overview#supported-data-types).
     * - `version`. To enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control for an update operation, include the current version of the custom attribute.
     * If this is not important for your application, version can be set to -1.
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
     *   locationId: string,
     *   key: string,
     *   customAttribute: CustomAttribute,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->key = $values['key'];
        $this->customAttribute = $values['customAttribute'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
