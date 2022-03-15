<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * This model gives the details of a cash drawer shift.
 * The cash_payment_money, cash_refund_money, cash_paid_in_money,
 * and cash_paid_out_money fields are all computed by summing their respective
 * event types.
 */
class CashDrawerShift implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $state;

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
     * @var Money|null
     */
    private $openedCashMoney;

    /**
     * @var Money|null
     */
    private $cashPaymentMoney;

    /**
     * @var Money|null
     */
    private $cashRefundsMoney;

    /**
     * @var Money|null
     */
    private $cashPaidInMoney;

    /**
     * @var Money|null
     */
    private $cashPaidOutMoney;

    /**
     * @var Money|null
     */
    private $expectedCashMoney;

    /**
     * @var Money|null
     */
    private $closedCashMoney;

    /**
     * @var CashDrawerDevice|null
     */
    private $device;

    /**
     * Returns Id.
     *
     * The shift unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The shift unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns State.
     *
     * The current state of a cash drawer shift.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * The current state of a cash drawer shift.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
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
     * The IDs of all employees that were logged into Square Point of Sale at any
     * point while the cash drawer shift was open.
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
     * The IDs of all employees that were logged into Square Point of Sale at any
     * point while the cash drawer shift was open.
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
     * The ID of the employee that closed the cash drawer shift by auditing
     * the cash drawer contents.
     */
    public function getClosingEmployeeId(): ?string
    {
        return $this->closingEmployeeId;
    }

    /**
     * Sets Closing Employee Id.
     *
     * The ID of the employee that closed the cash drawer shift by auditing
     * the cash drawer contents.
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
     * The free-form text description of a cash drawer by an employee.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The free-form text description of a cash drawer by an employee.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Opened Cash Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getOpenedCashMoney(): ?Money
    {
        return $this->openedCashMoney;
    }

    /**
     * Sets Opened Cash Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps opened_cash_money
     */
    public function setOpenedCashMoney(?Money $openedCashMoney): void
    {
        $this->openedCashMoney = $openedCashMoney;
    }

    /**
     * Returns Cash Payment Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getCashPaymentMoney(): ?Money
    {
        return $this->cashPaymentMoney;
    }

    /**
     * Sets Cash Payment Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps cash_payment_money
     */
    public function setCashPaymentMoney(?Money $cashPaymentMoney): void
    {
        $this->cashPaymentMoney = $cashPaymentMoney;
    }

    /**
     * Returns Cash Refunds Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getCashRefundsMoney(): ?Money
    {
        return $this->cashRefundsMoney;
    }

    /**
     * Sets Cash Refunds Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps cash_refunds_money
     */
    public function setCashRefundsMoney(?Money $cashRefundsMoney): void
    {
        $this->cashRefundsMoney = $cashRefundsMoney;
    }

    /**
     * Returns Cash Paid in Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getCashPaidInMoney(): ?Money
    {
        return $this->cashPaidInMoney;
    }

    /**
     * Sets Cash Paid in Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps cash_paid_in_money
     */
    public function setCashPaidInMoney(?Money $cashPaidInMoney): void
    {
        $this->cashPaidInMoney = $cashPaidInMoney;
    }

    /**
     * Returns Cash Paid Out Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getCashPaidOutMoney(): ?Money
    {
        return $this->cashPaidOutMoney;
    }

    /**
     * Sets Cash Paid Out Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps cash_paid_out_money
     */
    public function setCashPaidOutMoney(?Money $cashPaidOutMoney): void
    {
        $this->cashPaidOutMoney = $cashPaidOutMoney;
    }

    /**
     * Returns Expected Cash Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getExpectedCashMoney(): ?Money
    {
        return $this->expectedCashMoney;
    }

    /**
     * Sets Expected Cash Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps expected_cash_money
     */
    public function setExpectedCashMoney(?Money $expectedCashMoney): void
    {
        $this->expectedCashMoney = $expectedCashMoney;
    }

    /**
     * Returns Closed Cash Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getClosedCashMoney(): ?Money
    {
        return $this->closedCashMoney;
    }

    /**
     * Sets Closed Cash Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps closed_cash_money
     */
    public function setClosedCashMoney(?Money $closedCashMoney): void
    {
        $this->closedCashMoney = $closedCashMoney;
    }

    /**
     * Returns Device.
     */
    public function getDevice(): ?CashDrawerDevice
    {
        return $this->device;
    }

    /**
     * Sets Device.
     *
     * @maps device
     */
    public function setDevice(?CashDrawerDevice $device): void
    {
        $this->device = $device;
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
        if (isset($this->id)) {
            $json['id']                  = $this->id;
        }
        if (isset($this->state)) {
            $json['state']               = $this->state;
        }
        if (isset($this->openedAt)) {
            $json['opened_at']           = $this->openedAt;
        }
        if (isset($this->endedAt)) {
            $json['ended_at']            = $this->endedAt;
        }
        if (isset($this->closedAt)) {
            $json['closed_at']           = $this->closedAt;
        }
        if (isset($this->employeeIds)) {
            $json['employee_ids']        = $this->employeeIds;
        }
        if (isset($this->openingEmployeeId)) {
            $json['opening_employee_id'] = $this->openingEmployeeId;
        }
        if (isset($this->endingEmployeeId)) {
            $json['ending_employee_id']  = $this->endingEmployeeId;
        }
        if (isset($this->closingEmployeeId)) {
            $json['closing_employee_id'] = $this->closingEmployeeId;
        }
        if (isset($this->description)) {
            $json['description']         = $this->description;
        }
        if (isset($this->openedCashMoney)) {
            $json['opened_cash_money']   = $this->openedCashMoney;
        }
        if (isset($this->cashPaymentMoney)) {
            $json['cash_payment_money']  = $this->cashPaymentMoney;
        }
        if (isset($this->cashRefundsMoney)) {
            $json['cash_refunds_money']  = $this->cashRefundsMoney;
        }
        if (isset($this->cashPaidInMoney)) {
            $json['cash_paid_in_money']  = $this->cashPaidInMoney;
        }
        if (isset($this->cashPaidOutMoney)) {
            $json['cash_paid_out_money'] = $this->cashPaidOutMoney;
        }
        if (isset($this->expectedCashMoney)) {
            $json['expected_cash_money'] = $this->expectedCashMoney;
        }
        if (isset($this->closedCashMoney)) {
            $json['closed_cash_money']   = $this->closedCashMoney;
        }
        if (isset($this->device)) {
            $json['device']              = $this->device;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
