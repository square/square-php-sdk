<?php

namespace Square\GiftCards\Activities\Requests;

use Square\Core\Json\JsonSerializableType;

class ListActivitiesRequest extends JsonSerializableType
{
    /**
     * If a gift card ID is provided, the endpoint returns activities related
     * to the specified gift card. Otherwise, the endpoint returns all gift card activities for
     * the seller.
     *
     * @var ?string $giftCardId
     */
    private ?string $giftCardId;

    /**
     * If a [type](entity:GiftCardActivityType) is provided, the endpoint returns gift card activities of the specified type.
     * Otherwise, the endpoint returns all types of gift card activities.
     *
     * @var ?string $type
     */
    private ?string $type;

    /**
     * If a location ID is provided, the endpoint returns gift card activities for the specified location.
     * Otherwise, the endpoint returns gift card activities for all locations.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * The timestamp for the beginning of the reporting period, in RFC 3339 format.
     * This start time is inclusive. The default value is the current time minus one year.
     *
     * @var ?string $beginTime
     */
    private ?string $beginTime;

    /**
     * The timestamp for the end of the reporting period, in RFC 3339 format.
     * This end time is inclusive. The default value is the current time.
     *
     * @var ?string $endTime
     */
    private ?string $endTime;

    /**
     * If a limit is provided, the endpoint returns the specified number
     * of results (or fewer) per page. The maximum value is 100. The default value is 50.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * If a cursor is not provided, the endpoint returns the first page of the results.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * The order in which the endpoint returns the activities, based on `created_at`.
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     *
     * @var ?string $sortOrder
     */
    private ?string $sortOrder;

    /**
     * @param array{
     *   giftCardId?: ?string,
     *   type?: ?string,
     *   locationId?: ?string,
     *   beginTime?: ?string,
     *   endTime?: ?string,
     *   limit?: ?int,
     *   cursor?: ?string,
     *   sortOrder?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->giftCardId = $values['giftCardId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->beginTime = $values['beginTime'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getGiftCardId(): ?string
    {
        return $this->giftCardId;
    }

    /**
     * @param ?string $value
     */
    public function setGiftCardId(?string $value = null): self
    {
        $this->giftCardId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?string $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
        return $this;
    }
}
