<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * The summary of a closed cash drawer shift.
 * This model contains only the money counted to start a cash drawer shift, counted
 * at the end of the shift, and the amount that should be in the drawer at shift
 * end based on summing all cash drawer shift events.
 */
class CashDrawerShiftSummary implements \JsonSerializable
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
    private $expectedCashMoney;

    /**
     * @var Money|null
     */
    private $closedCashMoney;

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
     * The shift start time in ISO 8601 format.
     */
    public function getOpenedAt(): ?string
    {
        return $this->openedAt;
    }

    /**
     * Sets Opened At.
     *
     * The shift start time in ISO 8601 format.
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
     * The shift end time in ISO 8601 format.
     */
    public function getEndedAt(): ?string
    {
        return $this->endedAt;
    }

    /**
     * Sets Ended At.
     *
     * The shift end time in ISO 8601 format.
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
     * The shift close time in ISO 8601 format.
     */
    public function getClosedAt(): ?string
    {
        return $this->closedAt;
    }

    /**
     * Sets Closed At.
     *
     * The shift close time in ISO 8601 format.
     *
     * @maps closed_at
     */
    public function setClosedAt(?string $closedAt): void
    {
        $this->closedAt = $closedAt;
    }

    /**
     * Returns Description.
     *
     * An employee free-text description of a cash drawer shift.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * An employee free-text description of a cash drawer shift.
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
        if (isset($this->description)) {
            $json['description']         = $this->description;
        }
        if (isset($this->openedCashMoney)) {
            $json['opened_cash_money']   = $this->openedCashMoney;
        }
        if (isset($this->expectedCashMoney)) {
            $json['expected_cash_money'] = $this->expectedCashMoney;
        }
        if (isset($this->closedCashMoney)) {
            $json['closed_cash_money']   = $this->closedCashMoney;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
