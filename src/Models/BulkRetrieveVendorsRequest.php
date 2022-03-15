<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents an input to a call to [BulkRetrieveVendors.]($e/Vendors/BulkRetrieveVendors)
 */
class BulkRetrieveVendorsRequest implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $vendorIds;

    /**
     * Returns Vendor Ids.
     *
     * IDs of the [Vendor]($m/Vendor) objects to retrieve.
     *
     * @return string[]|null
     */
    public function getVendorIds(): ?array
    {
        return $this->vendorIds;
    }

    /**
     * Sets Vendor Ids.
     *
     * IDs of the [Vendor]($m/Vendor) objects to retrieve.
     *
     * @maps vendor_ids
     *
     * @param string[]|null $vendorIds
     */
    public function setVendorIds(?array $vendorIds): void
    {
        $this->vendorIds = $vendorIds;
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
        if (isset($this->vendorIds)) {
            $json['vendor_ids'] = $this->vendorIds;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
