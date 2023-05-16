<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CashDrawerDevice;
use Square\Models\CashDrawerShift;
use Square\Models\Money;

/**
 * Builder for model CashDrawerShift
 *
 * @see CashDrawerShift
 */
class CashDrawerShiftBuilder
{
    /**
     * @var CashDrawerShift
     */
    private $instance;

    private function __construct(CashDrawerShift $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new cash drawer shift Builder object.
     */
    public static function init(): self
    {
        return new self(new CashDrawerShift());
    }

    /**
     * Sets id field.
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets state field.
     */
    public function state(?string $value): self
    {
        $this->instance->setState($value);
        return $this;
    }

    /**
     * Sets opened at field.
     */
    public function openedAt(?string $value): self
    {
        $this->instance->setOpenedAt($value);
        return $this;
    }

    /**
     * Unsets opened at field.
     */
    public function unsetOpenedAt(): self
    {
        $this->instance->unsetOpenedAt();
        return $this;
    }

    /**
     * Sets ended at field.
     */
    public function endedAt(?string $value): self
    {
        $this->instance->setEndedAt($value);
        return $this;
    }

    /**
     * Unsets ended at field.
     */
    public function unsetEndedAt(): self
    {
        $this->instance->unsetEndedAt();
        return $this;
    }

    /**
     * Sets closed at field.
     */
    public function closedAt(?string $value): self
    {
        $this->instance->setClosedAt($value);
        return $this;
    }

    /**
     * Unsets closed at field.
     */
    public function unsetClosedAt(): self
    {
        $this->instance->unsetClosedAt();
        return $this;
    }

    /**
     * Sets description field.
     */
    public function description(?string $value): self
    {
        $this->instance->setDescription($value);
        return $this;
    }

    /**
     * Unsets description field.
     */
    public function unsetDescription(): self
    {
        $this->instance->unsetDescription();
        return $this;
    }

    /**
     * Sets opened cash money field.
     */
    public function openedCashMoney(?Money $value): self
    {
        $this->instance->setOpenedCashMoney($value);
        return $this;
    }

    /**
     * Sets cash payment money field.
     */
    public function cashPaymentMoney(?Money $value): self
    {
        $this->instance->setCashPaymentMoney($value);
        return $this;
    }

    /**
     * Sets cash refunds money field.
     */
    public function cashRefundsMoney(?Money $value): self
    {
        $this->instance->setCashRefundsMoney($value);
        return $this;
    }

    /**
     * Sets cash paid in money field.
     */
    public function cashPaidInMoney(?Money $value): self
    {
        $this->instance->setCashPaidInMoney($value);
        return $this;
    }

    /**
     * Sets cash paid out money field.
     */
    public function cashPaidOutMoney(?Money $value): self
    {
        $this->instance->setCashPaidOutMoney($value);
        return $this;
    }

    /**
     * Sets expected cash money field.
     */
    public function expectedCashMoney(?Money $value): self
    {
        $this->instance->setExpectedCashMoney($value);
        return $this;
    }

    /**
     * Sets closed cash money field.
     */
    public function closedCashMoney(?Money $value): self
    {
        $this->instance->setClosedCashMoney($value);
        return $this;
    }

    /**
     * Sets device field.
     */
    public function device(?CashDrawerDevice $value): self
    {
        $this->instance->setDevice($value);
        return $this;
    }

    /**
     * Sets created at field.
     */
    public function createdAt(?string $value): self
    {
        $this->instance->setCreatedAt($value);
        return $this;
    }

    /**
     * Sets updated at field.
     */
    public function updatedAt(?string $value): self
    {
        $this->instance->setUpdatedAt($value);
        return $this;
    }

    /**
     * Sets location id field.
     */
    public function locationId(?string $value): self
    {
        $this->instance->setLocationId($value);
        return $this;
    }

    /**
     * Sets team member ids field.
     */
    public function teamMemberIds(?array $value): self
    {
        $this->instance->setTeamMemberIds($value);
        return $this;
    }

    /**
     * Sets opening team member id field.
     */
    public function openingTeamMemberId(?string $value): self
    {
        $this->instance->setOpeningTeamMemberId($value);
        return $this;
    }

    /**
     * Sets ending team member id field.
     */
    public function endingTeamMemberId(?string $value): self
    {
        $this->instance->setEndingTeamMemberId($value);
        return $this;
    }

    /**
     * Sets closing team member id field.
     */
    public function closingTeamMemberId(?string $value): self
    {
        $this->instance->setClosingTeamMemberId($value);
        return $this;
    }

    /**
     * Initializes a new cash drawer shift object.
     */
    public function build(): CashDrawerShift
    {
        return CoreHelper::clone($this->instance);
    }
}
