<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\VoidTransactionResponse;

/**
 * Builder for model VoidTransactionResponse
 *
 * @see VoidTransactionResponse
 */
class VoidTransactionResponseBuilder
{
    /**
     * @var VoidTransactionResponse
     */
    private $instance;

    private function __construct(VoidTransactionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Void Transaction Response Builder object.
     */
    public static function init(): self
    {
        return new self(new VoidTransactionResponse());
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
     * Initializes a new Void Transaction Response object.
     */
    public function build(): VoidTransactionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
