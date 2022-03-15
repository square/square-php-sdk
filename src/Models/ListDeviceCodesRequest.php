<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @var string[]|null
     */
    private $status;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more
     * information.
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
     * See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more
     * information.
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
     * Returns Status.
     *
     * If specified, returns DeviceCodes with the specified statuses.
     * Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty.
     * See [DeviceCodeStatus](#type-devicecodestatus) for possible values
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
     * If specified, returns DeviceCodes with the specified statuses.
     * Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty.
     * See [DeviceCodeStatus](#type-devicecodestatus) for possible values
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
        if (isset($this->cursor)) {
            $json['cursor']       = $this->cursor;
        }
        if (isset($this->locationId)) {
            $json['location_id']  = $this->locationId;
        }
        if (isset($this->productType)) {
            $json['product_type'] = $this->productType;
        }
        if (isset($this->status)) {
            $json['status']       = $this->status;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
