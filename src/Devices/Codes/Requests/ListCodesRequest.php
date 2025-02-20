<?php

namespace Square\Devices\Codes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\DeviceCodeStatus;

class ListCodesRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more information.
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * If specified, only returns DeviceCodes of the specified location.
     * Returns DeviceCodes of all locations if empty.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * If specified, only returns DeviceCodes targeting the specified product type.
     * Returns DeviceCodes of all product types if empty.
     *
     * @var ?'TERMINAL_API' $productType
     */
    private ?string $productType;

    /**
     * If specified, returns DeviceCodes with the specified statuses.
     * Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty.
     *
     * @var ?value-of<DeviceCodeStatus> $status
     */
    private ?string $status;

    /**
     * @param array{
     *   cursor?: ?string,
     *   locationId?: ?string,
     *   productType?: ?'TERMINAL_API',
     *   status?: ?value-of<DeviceCodeStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->productType = $values['productType'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?'TERMINAL_API'
     */
    public function getProductType(): ?string
    {
        return $this->productType;
    }

    /**
     * @param ?'TERMINAL_API' $value
     */
    public function setProductType(?string $value = null): self
    {
        $this->productType = $value;
        return $this;
    }

    /**
     * @return ?value-of<DeviceCodeStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<DeviceCodeStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }
}
