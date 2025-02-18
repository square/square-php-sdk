<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class CatalogInfoResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?CatalogInfoResponseLimits $limits Limits that apply to this API.
     */
    #[JsonProperty('limits')]
    private ?CatalogInfoResponseLimits $limits;

    /**
     * @var ?StandardUnitDescriptionGroup $standardUnitDescriptionGroup Names and abbreviations for standard units.
     */
    #[JsonProperty('standard_unit_description_group')]
    private ?StandardUnitDescriptionGroup $standardUnitDescriptionGroup;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   limits?: ?CatalogInfoResponseLimits,
     *   standardUnitDescriptionGroup?: ?StandardUnitDescriptionGroup,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->limits = $values['limits'] ?? null;
        $this->standardUnitDescriptionGroup = $values['standardUnitDescriptionGroup'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?CatalogInfoResponseLimits
     */
    public function getLimits(): ?CatalogInfoResponseLimits
    {
        return $this->limits;
    }

    /**
     * @param ?CatalogInfoResponseLimits $value
     */
    public function setLimits(?CatalogInfoResponseLimits $value = null): self
    {
        $this->limits = $value;
        return $this;
    }

    /**
     * @return ?StandardUnitDescriptionGroup
     */
    public function getStandardUnitDescriptionGroup(): ?StandardUnitDescriptionGroup
    {
        return $this->standardUnitDescriptionGroup;
    }

    /**
     * @param ?StandardUnitDescriptionGroup $value
     */
    public function setStandardUnitDescriptionGroup(?StandardUnitDescriptionGroup $value = null): self
    {
        $this->standardUnitDescriptionGroup = $value;
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
