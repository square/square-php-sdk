<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Defines supported query expressions to search for vendors by.
 */
class SearchVendorsRequestFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $name;

    /**
     * @var string[]|null
     */
    private $status;

    /**
     * Returns Name.
     *
     * The names of the [Vendor]($m/Vendor) objects to retrieve.
     *
     * @return string[]|null
     */
    public function getName(): ?array
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The names of the [Vendor]($m/Vendor) objects to retrieve.
     *
     * @maps name
     *
     * @param string[]|null $name
     */
    public function setName(?array $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Status.
     *
     * The statuses of the [Vendor]($m/Vendor) objects to retrieve.
     * See [VendorStatus](#type-vendorstatus) for possible values
     *
     * @return string[]|null
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The statuses of the [Vendor]($m/Vendor) objects to retrieve.
     * See [VendorStatus](#type-vendorstatus) for possible values
     *
     * @maps status
     *
     * @param string[]|null $status
     */
    public function setStatus(?array $status): void
    {
        $this->status = $status;
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
        if (isset($this->name)) {
            $json['name']   = $this->name;
        }
        if (isset($this->status)) {
            $json['status'] = $this->status;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
