<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\ChargeRequestAdditionalRecipient;
use Square\Legacy\Models\Money;

/**
 * Builder for model ChargeRequestAdditionalRecipient
 *
 * @see ChargeRequestAdditionalRecipient
 */
class ChargeRequestAdditionalRecipientBuilder
{
    /**
     * @var ChargeRequestAdditionalRecipient
     */
    private $instance;

    private function __construct(ChargeRequestAdditionalRecipient $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Charge Request Additional Recipient Builder object.
     *
     * @param string $locationId
     * @param string $description
     * @param Money $amountMoney
     */
    public static function init(string $locationId, string $description, Money $amountMoney): self
    {
        return new self(new ChargeRequestAdditionalRecipient($locationId, $description, $amountMoney));
    }

    /**
     * Initializes a new Charge Request Additional Recipient object.
     */
    public function build(): ChargeRequestAdditionalRecipient
    {
        return CoreHelper::clone($this->instance);
    }
}
