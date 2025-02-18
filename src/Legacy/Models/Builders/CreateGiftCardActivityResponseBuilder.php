<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateGiftCardActivityResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GiftCardActivity;

/**
 * Builder for model CreateGiftCardActivityResponse
 *
 * @see CreateGiftCardActivityResponse
 */
class CreateGiftCardActivityResponseBuilder
{
    /**
     * @var CreateGiftCardActivityResponse
     */
    private $instance;

    private function __construct(CreateGiftCardActivityResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Gift Card Activity Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateGiftCardActivityResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets gift card activity field.
     *
     * @param GiftCardActivity|null $value
     */
    public function giftCardActivity(?GiftCardActivity $value): self
    {
        $this->instance->setGiftCardActivity($value);
        return $this;
    }

    /**
     * Initializes a new Create Gift Card Activity Response object.
     */
    public function build(): CreateGiftCardActivityResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
