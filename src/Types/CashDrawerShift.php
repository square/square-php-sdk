<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * This model gives the details of a cash drawer shift.
 * The cash_payment_money, cash_refund_money, cash_paid_in_money,
 * and cash_paid_out_money fields are all computed by summing their respective
 * event types.
 */
class CashDrawerShift extends JsonSerializableType
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
     * @var ?string $openedAt The time when the shift began, in ISO 8601 format.
     */
    #[JsonProperty('opened_at')]
    private ?string $openedAt;

    /**
     * @var ?string $endedAt The time when the shift ended, in ISO 8601 format.
     */
    #[JsonProperty('ended_at')]
    private ?string $endedAt;

    /**
     * @var ?string $closedAt The time when the shift was closed, in ISO 8601 format.
     */
    #[JsonProperty('closed_at')]
    private ?string $closedAt;

    /**
     * @var ?string $description The free-form text description of a cash drawer by an employee.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * The amount of money in the cash drawer at the start of the shift.
     * The amount must be greater than or equal to zero.
     *
     * @var ?Money $openedCashMoney
     */
    #[JsonProperty('opened_cash_money')]
    private ?Money $openedCashMoney;

    /**
     * The amount of money added to the cash drawer from cash payments.
     * This is computed by summing all events with the types CASH_TENDER_PAYMENT and
     * CASH_TENDER_CANCELED_PAYMENT. The amount is always greater than or equal to
     * zero.
     *
     * @var ?Money $cashPaymentMoney
     */
    #[JsonProperty('cash_payment_money')]
    private ?Money $cashPaymentMoney;

    /**
     * The amount of money removed from the cash drawer from cash refunds.
     * It is computed by summing the events of type CASH_TENDER_REFUND. The amount
     * is always greater than or equal to zero.
     *
     * @var ?Money $cashRefundsMoney
     */
    #[JsonProperty('cash_refunds_money')]
    private ?Money $cashRefundsMoney;

    /**
     * The amount of money added to the cash drawer for reasons other than cash
     * payments. It is computed by summing the events of type PAID_IN. The amount is
     * always greater than or equal to zero.
     *
     * @var ?Money $cashPaidInMoney
     */
    #[JsonProperty('cash_paid_in_money')]
    private ?Money $cashPaidInMoney;

    /**
     * The amount of money removed from the cash drawer for reasons other than
     * cash refunds. It is computed by summing the events of type PAID_OUT. The amount
     * is always greater than or equal to zero.
     *
     * @var ?Money $cashPaidOutMoney
     */
    #[JsonProperty('cash_paid_out_money')]
    private ?Money $cashPaidOutMoney;

    /**
     * The amount of money that should be in the cash drawer at the end of the
     * shift, based on the shift's other money amounts.
     * This can be negative if employees have not correctly recorded all the events
     * on the cash drawer.
     * cash_paid_out_money is a summation of amounts from cash_payment_money (zero
     * or positive), cash_refunds_money (zero or negative), cash_paid_in_money (zero
     * or positive), and cash_paid_out_money (zero or negative) event types.
     *
     * @var ?Money $expectedCashMoney
     */
    #[JsonProperty('expected_cash_money')]
    private ?Money $expectedCashMoney;

    /**
     * The amount of money found in the cash drawer at the end of the shift
     * by an auditing employee. The amount should be positive.
     *
     * @var ?Money $closedCashMoney
     */
    #[JsonProperty('closed_cash_money')]
    private ?Money $closedCashMoney;

    /**
     * @var ?CashDrawerDevice $device The device running Square Point of Sale that was connected to the cash drawer.
     */
    #[JsonProperty('device')]
    private ?CashDrawerDevice $device;

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
     * The IDs of all team members that were logged into Square Point of Sale at any
     * point while the cash drawer shift was open.
     *
     * @var ?array<string> $teamMemberIds
     */
    #[JsonProperty('team_member_ids'), ArrayType(['string'])]
    private ?array $teamMemberIds;

    /**
     * @var ?string $openingTeamMemberId The ID of the team member that started the cash drawer shift.
     */
    #[JsonProperty('opening_team_member_id')]
    private ?string $openingTeamMemberId;

    /**
     * @var ?string $endingTeamMemberId The ID of the team member that ended the cash drawer shift.
     */
    #[JsonProperty('ending_team_member_id')]
    private ?string $endingTeamMemberId;

    /**
     * The ID of the team member that closed the cash drawer shift by auditing
     * the cash drawer contents.
     *
     * @var ?string $closingTeamMemberId
     */
    #[JsonProperty('closing_team_member_id')]
    private ?string $closingTeamMemberId;

    /**
     * @param array{
     *   id?: ?string,
     *   state?: ?value-of<CashDrawerShiftState>,
     *   openedAt?: ?string,
     *   endedAt?: ?string,
     *   closedAt?: ?string,
     *   description?: ?string,
     *   openedCashMoney?: ?Money,
     *   cashPaymentMoney?: ?Money,
     *   cashRefundsMoney?: ?Money,
     *   cashPaidInMoney?: ?Money,
     *   cashPaidOutMoney?: ?Money,
     *   expectedCashMoney?: ?Money,
     *   closedCashMoney?: ?Money,
     *   device?: ?CashDrawerDevice,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   locationId?: ?string,
     *   teamMemberIds?: ?array<string>,
     *   openingTeamMemberId?: ?string,
     *   endingTeamMemberId?: ?string,
     *   closingTeamMemberId?: ?string,
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
        $this->cashPaymentMoney = $values['cashPaymentMoney'] ?? null;
        $this->cashRefundsMoney = $values['cashRefundsMoney'] ?? null;
        $this->cashPaidInMoney = $values['cashPaidInMoney'] ?? null;
        $this->cashPaidOutMoney = $values['cashPaidOutMoney'] ?? null;
        $this->expectedCashMoney = $values['expectedCashMoney'] ?? null;
        $this->closedCashMoney = $values['closedCashMoney'] ?? null;
        $this->device = $values['device'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->teamMemberIds = $values['teamMemberIds'] ?? null;
        $this->openingTeamMemberId = $values['openingTeamMemberId'] ?? null;
        $this->endingTeamMemberId = $values['endingTeamMemberId'] ?? null;
        $this->closingTeamMemberId = $values['closingTeamMemberId'] ?? null;
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
    public function getCashPaymentMoney(): ?Money
    {
        return $this->cashPaymentMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setCashPaymentMoney(?Money $value = null): self
    {
        $this->cashPaymentMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getCashRefundsMoney(): ?Money
    {
        return $this->cashRefundsMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setCashRefundsMoney(?Money $value = null): self
    {
        $this->cashRefundsMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getCashPaidInMoney(): ?Money
    {
        return $this->cashPaidInMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setCashPaidInMoney(?Money $value = null): self
    {
        $this->cashPaidInMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getCashPaidOutMoney(): ?Money
    {
        return $this->cashPaidOutMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setCashPaidOutMoney(?Money $value = null): self
    {
        $this->cashPaidOutMoney = $value;
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
     * @return ?CashDrawerDevice
     */
    public function getDevice(): ?CashDrawerDevice
    {
        return $this->device;
    }

    /**
     * @param ?CashDrawerDevice $value
     */
    public function setDevice(?CashDrawerDevice $value = null): self
    {
        $this->device = $value;
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
     * @return ?array<string>
     */
    public function getTeamMemberIds(): ?array
    {
        return $this->teamMemberIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTeamMemberIds(?array $value = null): self
    {
        $this->teamMemberIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOpeningTeamMemberId(): ?string
    {
        return $this->openingTeamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setOpeningTeamMemberId(?string $value = null): self
    {
        $this->openingTeamMemberId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndingTeamMemberId(): ?string
    {
        return $this->endingTeamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setEndingTeamMemberId(?string $value = null): self
    {
        $this->endingTeamMemberId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getClosingTeamMemberId(): ?string
    {
        return $this->closingTeamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setClosingTeamMemberId(?string $value = null): self
    {
        $this->closingTeamMemberId = $value;
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
