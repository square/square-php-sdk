<?php

namespace Square\Locations\Transactions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SortOrder;

class ListTransactionsRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the location to list transactions for.
     */
    private string $locationId;

    /**
     * The beginning of the requested reporting period, in RFC 3339 format.
     *
     * See [Date ranges](https://developer.squareup.com/docs/build-basics/working-with-dates) for details on date inclusivity/exclusivity.
     *
     * Default value: The current time minus one year.
     *
     * @var ?string $beginTime
     */
    private ?string $beginTime;

    /**
     * The end of the requested reporting period, in RFC 3339 format.
     *
     * See [Date ranges](https://developer.squareup.com/docs/build-basics/working-with-dates) for details on date inclusivity/exclusivity.
     *
     * Default value: The current time.
     *
     * @var ?string $endTime
     */
    private ?string $endTime;

    /**
     * The order in which results are listed in the response (`ASC` for
     * oldest first, `DESC` for newest first).
     *
     * Default value: `DESC`
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    private ?string $sortOrder;

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
     * @param array{
     *   locationId: string,
     *   beginTime?: ?string,
     *   endTime?: ?string,
     *   sortOrder?: ?value-of<SortOrder>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->beginTime = $values['beginTime'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
     * @return ?string
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * @param ?string $value
     */
    public function setBeginTime(?string $value = null): self
    {
        $this->beginTime = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * @param ?string $value
     */
    public function setEndTime(?string $value = null): self
    {
        $this->endTime = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
        return $this;
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
}
