<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CashDrawerShiftEvent;
use Square\Legacy\Models\Money;

/**
 * Builder for model CashDrawerShiftEvent
 *
 * @see CashDrawerShiftEvent
 */
class CashDrawerShiftEventBuilder
{
    /**
     * @var CashDrawerShiftEvent
     */
    private $instance;

    private function __construct(CashDrawerShiftEvent $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Cash Drawer Shift Event Builder object.
     */
    public static function init(): self
    {
        return new self(new CashDrawerShiftEvent());
    }

    /**
     * Sets id field.
     *
     * @param string|null $value
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets event type field.
     *
     * @param string|null $value
     */
    public function eventType(?string $value): self
    {
        $this->instance->setEventType($value);
        return $this;
    }

    /**
     * Sets event money field.
     *
     * @param Money|null $value
     */
    public function eventMoney(?Money $value): self
    {
        $this->instance->setEventMoney($value);
        return $this;
    }

    /**
     * Sets created at field.
     *
     * @param string|null $value
     */
    public function createdAt(?string $value): self
    {
        $this->instance->setCreatedAt($value);
        return $this;
    }

    /**
     * Sets description field.
     *
     * @param string|null $value
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
     * Sets team member id field.
     *
     * @param string|null $value
     */
    public function teamMemberId(?string $value): self
    {
        $this->instance->setTeamMemberId($value);
        return $this;
    }

    /**
     * Initializes a new Cash Drawer Shift Event object.
     */
    public function build(): CashDrawerShiftEvent
    {
        return CoreHelper::clone($this->instance);
    }
}
