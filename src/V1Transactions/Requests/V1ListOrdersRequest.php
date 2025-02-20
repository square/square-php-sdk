<?php

namespace Square\V1Transactions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SortOrder;

class V1ListOrdersRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the location to list online store orders for.
     */
    private string $locationId;

    /**
     * @var ?value-of<SortOrder> $order The order in which payments are listed in the response.
     */
    private ?string $order;

    /**
     * @var ?int $limit The maximum number of payments to return in a single response. This value cannot exceed 200.
     */
    private ?int $limit;

    /**
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint.
     *
     * @var ?string $batchToken
     */
    private ?string $batchToken;

    /**
     * @param array{
     *   locationId: string,
     *   order?: ?value-of<SortOrder>,
     *   limit?: ?int,
     *   batchToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->order = $values['order'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->batchToken = $values['batchToken'] ?? null;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setOrder(?string $value = null): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBatchToken(): ?string
    {
        return $this->batchToken;
    }

    /**
     * @param ?string $value
     */
    public function setBatchToken(?string $value = null): self
    {
        $this->batchToken = $value;
        return $this;
    }
}
