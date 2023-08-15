<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\TenderSquareAccountDetails;

/**
 * Builder for model TenderSquareAccountDetails
 *
 * @see TenderSquareAccountDetails
 */
class TenderSquareAccountDetailsBuilder
{
    /**
     * @var TenderSquareAccountDetails
     */
    private $instance;

    private function __construct(TenderSquareAccountDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new tender square account details Builder object.
     */
    public static function init(): self
    {
        return new self(new TenderSquareAccountDetails());
    }

    /**
     * Sets status field.
     */
    public function status(?string $value): self
    {
        $this->instance->setStatus($value);
        return $this;
    }

    /**
     * Initializes a new tender square account details object.
     */
    public function build(): TenderSquareAccountDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
