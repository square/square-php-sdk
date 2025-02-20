<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The summary of a closed cash drawer shift.
 * This model contains only the money counted to start a cash drawer shift, counted
 * at the end of the shift, and the amount that should be in the drawer at shift
 * end based on summing all cash drawer shift events.
 */
class CashDrawerShiftSummary extends JsonSerializableType
{
    /**
     * @var ?string $id The shift unique ID.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The shift current state.
     * See [CashDrawerShiftState](#type-cashdrawershiftstate) for possible values
     *
     * @var ?value-of<CashDrawerShiftState> $state
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?string $openedAt The shift start time in ISO 8601 format.
     */
    #[JsonProperty('opened_at')]
    private ?string $openedAt;

    /**
     * @var ?string $endedAt The shift end time in ISO 8601 format.
     */
    #[JsonProperty('ended_at')]
    private ?string $endedAt;

    /**
     * @var ?string $closedAt The shift close time in ISO 8601 format.
     */
    #[JsonProperty('closed_at')]
    private ?string $closedAt;

    /**
     * @var ?string $description An employee free-text description of a cash drawer shift.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * The amount of money in the cash drawer at the start of the shift. This
     * must be a positive amount.
     *
     * @var ?Money $openedCashMoney
     */
    #[JsonProperty('opened_cash_money')]
    private ?Money $openedCashMoney;

    /**
     * The amount of money that should be in the cash drawer at the end of the
     * shift, based on the cash drawer events on the shift.
     * The amount is correct if all shift employees accurately recorded their
     * cash drawer shift events. Unrecorded events and events with the wrong amount
     * result in an incorrect expected_cash_money amount that can be negative.
     *
     * @var ?Money $expectedCashMoney
     */
    #[JsonProperty('expected_cash_money')]
    private ?Money $expectedCashMoney;

    /**
     * The amount of money found in the cash drawer at the end of the shift by
     * an auditing employee. The amount must be greater than or equal to zero.
     *
     * @var ?Money $closedCashMoney
     */
    #[JsonProperty('closed_cash_money')]
    private ?Money $closedCashMoney;

    /**
     * @var ?string $createdAt The shift start time in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The shift updated at time in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $locationId The ID of the location the cash drawer shift belongs to.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @param array{
     *   id?: ?string,
     *   state?: ?value-of<CashDrawerShiftState>,
     *   openedAt?: ?string,
     *   endedAt?: ?string,
     *   closedAt?: ?string,
     *   description?: ?string,
     *   openedCashMoney?: ?Money,
     *   expectedCashMoney?: ?Money,
     *   closedCashMoney?: ?Money,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->openedAt = $values['openedAt'] ?? null;
        $this->endedAt = $values['endedAt'] ?? null;
        $this->closedAt = $values['closedAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->openedCashMoney = $values['openedCashMoney'] ?? null;
        $this->expectedCashMoney = $values['expectedCashMoney'] ?? null;
        $this->closedCashMoney = $values['closedCashMoney'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?value-of<CashDrawerShiftState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<CashDrawerShiftState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOpenedAt(): ?string
    {
        return $this->openedAt;
    }

    /**
     * @param ?string $value
     */
    public function setOpenedAt(?string $value = null): self
    {
        $this->openedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndedAt(): ?string
    {
        return $this->endedAt;
    }

    /**
     * @param ?string $value
     */
    public function setEndedAt(?string $value = null): self
    {
        $this->endedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getClosedAt(): ?string
    {
        return $this->closedAt;
    }

    /**
     * @param ?string $value
     */
    public function setClosedAt(?string $value = null): self
    {
        $this->closedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getOpenedCashMoney(): ?Money
    {
        return $this->openedCashMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setOpenedCashMoney(?Money $value = null): self
    {
        $this->openedCashMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getExpectedCashMoney(): ?Money
    {
        return $this->expectedCashMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setExpectedCashMoney(?Money $value = null): self
    {
        $this->expectedCashMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getClosedCashMoney(): ?Money
    {
        return $this->closedCashMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setClosedCashMoney(?Money $value = null): self
    {
        $this->closedCashMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
