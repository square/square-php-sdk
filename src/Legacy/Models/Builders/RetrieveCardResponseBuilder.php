<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Card;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveCardResponse;

/**
 * Builder for model RetrieveCardResponse
 *
 * @see RetrieveCardResponse
 */
class RetrieveCardResponseBuilder
{
    /**
     * @var RetrieveCardResponse
     */
    private $instance;

    private function __construct(RetrieveCardResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Card Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveCardResponse());
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
     * Sets card field.
     *
     * @param Card|null $value
     */
    public function card(?Card $value): self
    {
        $this->instance->setCard($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Card Response object.
     */
    public function build(): RetrieveCardResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
