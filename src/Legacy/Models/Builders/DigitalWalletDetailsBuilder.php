<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CashAppDetails;
use Square\Legacy\Models\DigitalWalletDetails;

/**
 * Builder for model DigitalWalletDetails
 *
 * @see DigitalWalletDetails
 */
class DigitalWalletDetailsBuilder
{
    /**
     * @var DigitalWalletDetails
     */
    private $instance;

    private function __construct(DigitalWalletDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Digital Wallet Details Builder object.
     */
    public static function init(): self
    {
        return new self(new DigitalWalletDetails());
    }

    /**
     * Sets status field.
     *
     * @param string|null $value
     */
    public function status(?string $value): self
    {
        $this->instance->setStatus($value);
        return $this;
    }

    /**
     * Unsets status field.
     */
    public function unsetStatus(): self
    {
        $this->instance->unsetStatus();
        return $this;
    }

    /**
     * Sets brand field.
     *
     * @param string|null $value
     */
    public function brand(?string $value): self
    {
        $this->instance->setBrand($value);
        return $this;
    }

    /**
     * Unsets brand field.
     */
    public function unsetBrand(): self
    {
        $this->instance->unsetBrand();
        return $this;
    }

    /**
     * Sets cash app details field.
     *
     * @param CashAppDetails|null $value
     */
    public function cashAppDetails(?CashAppDetails $value): self
    {
        $this->instance->setCashAppDetails($value);
        return $this;
    }

    /**
     * Initializes a new Digital Wallet Details object.
     */
    public function build(): DigitalWalletDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
