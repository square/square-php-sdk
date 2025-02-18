<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\AdditionalRecipient;
use Square\Legacy\Models\Money;

/**
 * Builder for model AdditionalRecipient
 *
 * @see AdditionalRecipient
 */
class AdditionalRecipientBuilder
{
    /**
     * @var AdditionalRecipient
     */
    private $instance;

    private function __construct(AdditionalRecipient $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Additional Recipient Builder object.
     *
     * @param string $locationId
     * @param Money $amountMoney
     */
    public static function init(string $locationId, Money $amountMoney): self
    {
        return new self(new AdditionalRecipient($locationId, $amountMoney));
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
     * Sets receivable id field.
     *
     * @param string|null $value
     */
    public function receivableId(?string $value): self
    {
        $this->instance->setReceivableId($value);
        return $this;
    }

    /**
     * Unsets receivable id field.
     */
    public function unsetReceivableId(): self
    {
        $this->instance->unsetReceivableId();
        return $this;
    }

    /**
     * Initializes a new Additional Recipient object.
     */
    public function build(): AdditionalRecipient
    {
        return CoreHelper::clone($this->instance);
    }
}
