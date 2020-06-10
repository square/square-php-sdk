<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains details for a single cash drawer shift.
 */
class V1CashDrawerShift implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $eventType;

    /**
     * @var string|null
     */
    private $openedAt;

    /**
     * @var string|null
     */
    private $endedAt;

    /**
     * @var string|null
     */
    private $closedAt;

    /**
     * @var string[]|null
     */
    private $employeeIds;

    /**
     * @var string|null
     */
    private $openingEmployeeId;

    /**
     * @var string|null
     */
    private $endingEmployeeId;

    /**
     * @var string|null
     */
    private $closingEmployeeId;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var V1Money|null
     */
    private $startingCashMoney;

    /**
     * @var V1Money|null
     */
    private $cashPaymentMoney;

    /**
     * @var V1Money|null
     */
    private $cashRefundsMoney;

    /**
     * @var V1Money|null
     */
    private $cashPaidInMoney;

    /**
     * @var V1Money|null
     */
    private $cashPaidOutMoney;

    /**
     * @var V1Money|null
     */
    private $expectedCashMoney;

    /**
     * @var V1Money|null
     */
    private $closedCashMoney;

    /**
     * @var Device|null
     */
    private $device;

    /**
     * @var V1CashDrawerEvent[]|null
     */
    private $events;

    /**
     * Returns Id.
     *
     * The shift's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The shift's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Event Type.
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * Sets Event Type.
     *
     * @maps event_type
     */
    public function setEventType(?string $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * Returns Opened At.
     *
     * The time when the shift began, in ISO 8601 format.
     */
    public function getOpenedAt(): ?string
    {
        return $this->openedAt;
    }

    /**
     * Sets Opened At.
     *
     * The time when the shift began, in ISO 8601 format.
     *
     * @maps opened_at
     */
    public function setOpenedAt(?string $openedAt): void
    {
        $this->openedAt = $openedAt;
    }

    /**
     * Returns Ended At.
     *
     * The time when the shift ended, in ISO 8601 format.
     */
    public function getEndedAt(): ?string
    {
        return $this->endedAt;
    }

    /**
     * Sets Ended At.
     *
     * The time when the shift ended, in ISO 8601 format.
     *
     * @maps ended_at
     */
    public function setEndedAt(?string $endedAt): void
    {
        $this->endedAt = $endedAt;
    }

    /**
     * Returns Closed At.
     *
     * The time when the shift was closed, in ISO 8601 format.
     */
    public function getClosedAt(): ?string
    {
        return $this->closedAt;
    }

    /**
     * Sets Closed At.
     *
     * The time when the shift was closed, in ISO 8601 format.
     *
     * @maps closed_at
     */
    public function setClosedAt(?string $closedAt): void
    {
        $this->closedAt = $closedAt;
    }

    /**
     * Returns Employee Ids.
     *
     * The IDs of all employees that were logged into Square Register at some point during the cash drawer
     * shift.
     *
     * @return string[]|null
     */
    public function getEmployeeIds(): ?array
    {
        return $this->employeeIds;
    }

    /**
     * Sets Employee Ids.
     *
     * The IDs of all employees that were logged into Square Register at some point during the cash drawer
     * shift.
     *
     * @maps employee_ids
     *
     * @param string[]|null $employeeIds
     */
    public function setEmployeeIds(?array $employeeIds): void
    {
        $this->employeeIds = $employeeIds;
    }

    /**
     * Returns Opening Employee Id.
     *
     * The ID of the employee that started the cash drawer shift.
     */
    public function getOpeningEmployeeId(): ?string
    {
        return $this->openingEmployeeId;
    }

    /**
     * Sets Opening Employee Id.
     *
     * The ID of the employee that started the cash drawer shift.
     *
     * @maps opening_employee_id
     */
    public function setOpeningEmployeeId(?string $openingEmployeeId): void
    {
        $this->openingEmployeeId = $openingEmployeeId;
    }

    /**
     * Returns Ending Employee Id.
     *
     * The ID of the employee that ended the cash drawer shift.
     */
    public function getEndingEmployeeId(): ?string
    {
        return $this->endingEmployeeId;
    }

    /**
     * Sets Ending Employee Id.
     *
     * The ID of the employee that ended the cash drawer shift.
     *
     * @maps ending_employee_id
     */
    public function setEndingEmployeeId(?string $endingEmployeeId): void
    {
        $this->endingEmployeeId = $endingEmployeeId;
    }

    /**
     * Returns Closing Employee Id.
     *
     * The ID of the employee that closed the cash drawer shift by auditing the cash drawer's contents.
     */
    public function getClosingEmployeeId(): ?string
    {
        return $this->closingEmployeeId;
    }

    /**
     * Sets Closing Employee Id.
     *
     * The ID of the employee that closed the cash drawer shift by auditing the cash drawer's contents.
     *
     * @maps closing_employee_id
     */
    public function setClosingEmployeeId(?string $closingEmployeeId): void
    {
        $this->closingEmployeeId = $closingEmployeeId;
    }

    /**
     * Returns Description.
     *
     * A description of the cash drawer shift.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * A description of the cash drawer shift.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Starting Cash Money.
     */
    public function getStartingCashMoney(): ?V1Money
    {
        return $this->startingCashMoney;
    }

    /**
     * Sets Starting Cash Money.
     *
     * @maps starting_cash_money
     */
    public function setStartingCashMoney(?V1Money $startingCashMoney): void
    {
        $this->startingCashMoney = $startingCashMoney;
    }

    /**
     * Returns Cash Payment Money.
     */
    public function getCashPaymentMoney(): ?V1Money
    {
        return $this->cashPaymentMoney;
    }

    /**
     * Sets Cash Payment Money.
     *
     * @maps cash_payment_money
     */
    public function setCashPaymentMoney(?V1Money $cashPaymentMoney): void
    {
        $this->cashPaymentMoney = $cashPaymentMoney;
    }

    /**
     * Returns Cash Refunds Money.
     */
    public function getCashRefundsMoney(): ?V1Money
    {
        return $this->cashRefundsMoney;
    }

    /**
     * Sets Cash Refunds Money.
     *
     * @maps cash_refunds_money
     */
    public function setCashRefundsMoney(?V1Money $cashRefundsMoney): void
    {
        $this->cashRefundsMoney = $cashRefundsMoney;
    }

    /**
     * Returns Cash Paid in Money.
     */
    public function getCashPaidInMoney(): ?V1Money
    {
        return $this->cashPaidInMoney;
    }

    /**
     * Sets Cash Paid in Money.
     *
     * @maps cash_paid_in_money
     */
    public function setCashPaidInMoney(?V1Money $cashPaidInMoney): void
    {
        $this->cashPaidInMoney = $cashPaidInMoney;
    }

    /**
     * Returns Cash Paid Out Money.
     */
    public function getCashPaidOutMoney(): ?V1Money
    {
        return $this->cashPaidOutMoney;
    }

    /**
     * Sets Cash Paid Out Money.
     *
     * @maps cash_paid_out_money
     */
    public function setCashPaidOutMoney(?V1Money $cashPaidOutMoney): void
    {
        $this->cashPaidOutMoney = $cashPaidOutMoney;
    }

    /**
     * Returns Expected Cash Money.
     */
    public function getExpectedCashMoney(): ?V1Money
    {
        return $this->expectedCashMoney;
    }

    /**
     * Sets Expected Cash Money.
     *
     * @maps expected_cash_money
     */
    public function setExpectedCashMoney(?V1Money $expectedCashMoney): void
    {
        $this->expectedCashMoney = $expectedCashMoney;
    }

    /**
     * Returns Closed Cash Money.
     */
    public function getClosedCashMoney(): ?V1Money
    {
        return $this->closedCashMoney;
    }

    /**
     * Sets Closed Cash Money.
     *
     * @maps closed_cash_money
     */
    public function setClosedCashMoney(?V1Money $closedCashMoney): void
    {
        $this->closedCashMoney = $closedCashMoney;
    }

    /**
     * Returns Device.
     */
    public function getDevice(): ?Device
    {
        return $this->device;
    }

    /**
     * Sets Device.
     *
     * @maps device
     */
    public function setDevice(?Device $device): void
    {
        $this->device = $device;
    }

    /**
     * Returns Events.
     *
     * All of the events (payments, refunds, and so on) that involved the cash drawer during the shift.
     *
     * @return V1CashDrawerEvent[]|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * Sets Events.
     *
     * All of the events (payments, refunds, and so on) that involved the cash drawer during the shift.
     *
     * @maps events
     *
     * @param V1CashDrawerEvent[]|null $events
     */
    public function setEvents(?array $events): void
    {
        $this->events = $events;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                = $this->id;
        $json['event_type']        = $this->eventType;
        $json['opened_at']         = $this->openedAt;
        $json['ended_at']          = $this->endedAt;
        $json['closed_at']         = $this->closedAt;
        $json['employee_ids']      = $this->employeeIds;
        $json['opening_employee_id'] = $this->openingEmployeeId;
        $json['ending_employee_id'] = $this->endingEmployeeId;
        $json['closing_employee_id'] = $this->closingEmployeeId;
        $json['description']       = $this->description;
        $json['starting_cash_money'] = $this->startingCashMoney;
        $json['cash_payment_money'] = $this->cashPaymentMoney;
        $json['cash_refunds_money'] = $this->cashRefundsMoney;
        $json['cash_paid_in_money'] = $this->cashPaidInMoney;
        $json['cash_paid_out_money'] = $this->cashPaidOutMoney;
        $json['expected_cash_money'] = $this->expectedCashMoney;
        $json['closed_cash_money'] = $this->closedCashMoney;
        $json['device']            = $this->device;
        $json['events']            = $this->events;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
