<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Configuration associated with Custom Attribute Definitions of type `STRING`.
 */
class CatalogCustomAttributeDefinitionStringConfig implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $enforceUniqueness;

    /**
     * Returns Enforce Uniqueness.
     *
     * If true, each Custom Attribute instance associated with this Custom Attribute
     * Definition must have a unique value within the seller's catalog. For
     * example, this may be used for a value like a SKU that should not be
     * duplicated within a seller's catalog. May not be modified after the
     * definition has been created.
     */
    public function getEnforceUniqueness(): ?bool
    {
        return $this->enforceUniqueness;
    }

    /**
     * Sets Enforce Uniqueness.
     *
     * If true, each Custom Attribute instance associated with this Custom Attribute
     * Definition must have a unique value within the seller's catalog. For
     * example, this may be used for a value like a SKU that should not be
     * duplicated within a seller's catalog. May not be modified after the
     * definition has been created.
     *
     * @maps enforce_uniqueness
     */
    public function setEnforceUniqueness(?bool $enforceUniqueness): void
    {
        $this->enforceUniqueness = $enforceUniqueness;
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
        if (isset($this->enforceUniqueness)) {
            $json['enforce_uniqueness'] = $this->enforceUniqueness;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
