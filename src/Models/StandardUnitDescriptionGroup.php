<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Group of standard measurement units.
 */
class StandardUnitDescriptionGroup implements \JsonSerializable
{
    /**
     * @var StandardUnitDescription[]|null
     */
    private $standardUnitDescriptions;

    /**
     * @var string|null
     */
    private $languageCode;

    /**
     * Returns Standard Unit Descriptions.
     *
     * List of standard (non-custom) measurement units in this description group.
     *
     * @return StandardUnitDescription[]|null
     */
    public function getStandardUnitDescriptions(): ?array
    {
        return $this->standardUnitDescriptions;
    }

    /**
     * Sets Standard Unit Descriptions.
     *
     * List of standard (non-custom) measurement units in this description group.
     *
     * @maps standard_unit_descriptions
     *
     * @param StandardUnitDescription[]|null $standardUnitDescriptions
     */
    public function setStandardUnitDescriptions(?array $standardUnitDescriptions): void
    {
        $this->standardUnitDescriptions = $standardUnitDescriptions;
    }

    /**
     * Returns Language Code.
     *
     * IETF language tag.
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * Sets Language Code.
     *
     * IETF language tag.
     *
     * @maps language_code
     */
    public function setLanguageCode(?string $languageCode): void
    {
        $this->languageCode = $languageCode;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->standardUnitDescriptions)) {
            $json['standard_unit_descriptions'] = $this->standardUnitDescriptions;
        }
        if (isset($this->languageCode)) {
            $json['language_code']              = $this->languageCode;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
