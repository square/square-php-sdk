<?php

declare(strict_types=1);

namespace Square\Models;

class ListDeviceCodesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $productType;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Paginating results](#paginatingresults) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Paginating results](#paginatingresults) for more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Location Id.
     *
     * If specified, only returns DeviceCodes of the specified location.
     * Returns DeviceCodes of all locations if empty.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * If specified, only returns DeviceCodes of the specified location.
     * Returns DeviceCodes of all locations if empty.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Product Type.
     */
    public function getProductType(): ?string
    {
        return $this->productType;
    }

    /**
     * Sets Product Type.
     *
     * @maps product_type
     */
    public function setProductType(?string $productType): void
    {
        $this->productType = $productType;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['cursor']      = $this->cursor;
        $json['location_id'] = $this->locationId;
        $json['product_type'] = $this->productType;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
