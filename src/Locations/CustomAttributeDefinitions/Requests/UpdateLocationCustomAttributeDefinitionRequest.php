<?php

namespace Square\Locations\CustomAttributeDefinitions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CustomAttributeDefinition;
use Square\Core\Json\JsonProperty;

class UpdateLocationCustomAttributeDefinitionRequest extends JsonSerializableType
{
    /**
     * @var string $key The key of the custom attribute definition to update.
     */
    private string $key;

    /**
     * The custom attribute definition that contains the fields to update. This endpoint
     * supports sparse updates, so only new or changed fields need to be included in the request.
     * Only the following fields can be updated:
     * - `name`
     * - `description`
     * - `visibility`
     * - `schema` for a `Selection` data type. Only changes to the named options or the maximum number of allowed
     * selections are supported.
     *
     * For more information, see
     * [Update a location custom attribute definition](https://developer.squareup.com/docs/location-custom-attributes-api/custom-attribute-definitions#update-custom-attribute-definition).
     * To enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control, specify the current version of the custom attribute definition.
     * If this is not important for your application, `version` can be set to -1.
     *
     * @var CustomAttributeDefinition $customAttributeDefinition
     */
    #[JsonProperty('custom_attribute_definition')]
    private CustomAttributeDefinition $customAttributeDefinition;

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
     *   key: string,
     *   customAttributeDefinition: CustomAttributeDefinition,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->customAttributeDefinition = $values['customAttributeDefinition'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
     * @return CustomAttributeDefinition
     */
    public function getCustomAttributeDefinition(): CustomAttributeDefinition
    {
        return $this->customAttributeDefinition;
    }

    /**
     * @param CustomAttributeDefinition $value
     */
    public function setCustomAttributeDefinition(CustomAttributeDefinition $value): self
    {
        $this->customAttributeDefinition = $value;
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
