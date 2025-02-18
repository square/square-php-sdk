<?php

namespace Square\Bookings\CustomAttributeDefinitions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CustomAttributeDefinition;
use Square\Core\Json\JsonProperty;

class CreateBookingCustomAttributeDefinitionRequest extends JsonSerializableType
{
    /**
     * The custom attribute definition to create, with the following fields:
     *
     * - `key`
     *
     * - `name`. If provided, `name` must be unique (case-sensitive) across all visible booking-related custom attribute
     * definitions for the seller.
     *
     * - `description`
     *
     * - `visibility`. Note that all custom attributes are visible in exported booking data, including those set to
     * `VISIBILITY_HIDDEN`.
     *
     * - `schema`. With the exception of the `Selection` data type, the `schema` is specified as a
     * simple URL to the JSON schema definition hosted on the Square CDN. For more information, see
     * [Specifying the schema](https://developer.squareup.com/docs/booking-custom-attributes-api/custom-attribute-definitions#specify-schema).
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
     *   customAttributeDefinition: CustomAttributeDefinition,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributeDefinition = $values['customAttributeDefinition'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
