<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Group of standard measurement units.
 */
class StandardUnitDescriptionGroup extends JsonSerializableType
{
    /**
     * @var ?array<StandardUnitDescription> $standardUnitDescriptions List of standard (non-custom) measurement units in this description group.
     */
    #[JsonProperty('standard_unit_descriptions'), ArrayType([StandardUnitDescription::class])]
    private ?array $standardUnitDescriptions;

    /**
     * @var ?string $languageCode IETF language tag.
     */
    #[JsonProperty('language_code')]
    private ?string $languageCode;

    /**
     * @param array{
     *   standardUnitDescriptions?: ?array<StandardUnitDescription>,
     *   languageCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->standardUnitDescriptions = $values['standardUnitDescriptions'] ?? null;
        $this->languageCode = $values['languageCode'] ?? null;
    }

    /**
     * @return ?array<StandardUnitDescription>
     */
    public function getStandardUnitDescriptions(): ?array
    {
        return $this->standardUnitDescriptions;
    }

    /**
     * @param ?array<StandardUnitDescription> $value
     */
    public function setStandardUnitDescriptions(?array $value = null): self
    {
        $this->standardUnitDescriptions = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param ?string $value
     */
    public function setLanguageCode(?string $value = null): self
    {
        $this->languageCode = $value;
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
