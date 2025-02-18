<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomerAddressFilter;
use Square\Legacy\Models\CustomerCustomAttributeFilterValue;
use Square\Legacy\Models\CustomerTextFilter;
use Square\Legacy\Models\FilterValue;
use Square\Legacy\Models\FloatNumberRange;
use Square\Legacy\Models\TimeRange;

/**
 * Builder for model CustomerCustomAttributeFilterValue
 *
 * @see CustomerCustomAttributeFilterValue
 */
class CustomerCustomAttributeFilterValueBuilder
{
    /**
     * @var CustomerCustomAttributeFilterValue
     */
    private $instance;

    private function __construct(CustomerCustomAttributeFilterValue $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Customer Custom Attribute Filter Value Builder object.
     */
    public static function init(): self
    {
        return new self(new CustomerCustomAttributeFilterValue());
    }

    /**
     * Sets email field.
     *
     * @param CustomerTextFilter|null $value
     */
    public function email(?CustomerTextFilter $value): self
    {
        $this->instance->setEmail($value);
        return $this;
    }

    /**
     * Sets phone field.
     *
     * @param CustomerTextFilter|null $value
     */
    public function phone(?CustomerTextFilter $value): self
    {
        $this->instance->setPhone($value);
        return $this;
    }

    /**
     * Sets text field.
     *
     * @param CustomerTextFilter|null $value
     */
    public function text(?CustomerTextFilter $value): self
    {
        $this->instance->setText($value);
        return $this;
    }

    /**
     * Sets selection field.
     *
     * @param FilterValue|null $value
     */
    public function selection(?FilterValue $value): self
    {
        $this->instance->setSelection($value);
        return $this;
    }

    /**
     * Sets date field.
     *
     * @param TimeRange|null $value
     */
    public function date(?TimeRange $value): self
    {
        $this->instance->setDate($value);
        return $this;
    }

    /**
     * Sets number field.
     *
     * @param FloatNumberRange|null $value
     */
    public function number(?FloatNumberRange $value): self
    {
        $this->instance->setNumber($value);
        return $this;
    }

    /**
     * Sets boolean field.
     *
     * @param bool|null $value
     */
    public function boolean(?bool $value): self
    {
        $this->instance->setBoolean($value);
        return $this;
    }

    /**
     * Unsets boolean field.
     */
    public function unsetBoolean(): self
    {
        $this->instance->unsetBoolean();
        return $this;
    }

    /**
     * Sets address field.
     *
     * @param CustomerAddressFilter|null $value
     */
    public function address(?CustomerAddressFilter $value): self
    {
        $this->instance->setAddress($value);
        return $this;
    }

    /**
     * Initializes a new Customer Custom Attribute Filter Value object.
     */
    public function build(): CustomerCustomAttributeFilterValue
    {
        return CoreHelper::clone($this->instance);
    }
}
