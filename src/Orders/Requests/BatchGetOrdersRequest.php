<?php

namespace Square\Orders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchGetOrdersRequest extends JsonSerializableType
{
    /**
     * The ID of the location for these orders. This field is optional: omit it to retrieve
     * orders within the scope of the current authorization's merchant ID.
     *
     * @var ?string $locationId
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var array<string> $orderIds The IDs of the orders to retrieve. A maximum of 100 orders can be retrieved per request.
     */
    #[JsonProperty('order_ids'), ArrayType(['string'])]
    private array $orderIds;

    /**
     * @param array{
     *   orderIds: array<string>,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->orderIds = $values['orderIds'];
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
     * @return array<string>
     */
    public function getOrderIds(): array
    {
        return $this->orderIds;
    }

    /**
     * @param array<string> $value
     */
    public function setOrderIds(array $value): self
    {
        $this->orderIds = $value;
        return $this;
    }
}
