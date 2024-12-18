<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Employee;
use Square\Models\Error;
use Square\Models\RetrieveEmployeeResponse;

/**
 * Builder for model RetrieveEmployeeResponse
 *
 * @see RetrieveEmployeeResponse
 */
class RetrieveEmployeeResponseBuilder
{
    /**
     * @var RetrieveEmployeeResponse
     */
    private $instance;

    private function __construct(RetrieveEmployeeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Employee Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveEmployeeResponse());
    }

    /**
     * Sets employee field.
     *
     * @param Employee|null $value
     */
    public function employee(?Employee $value): self
    {
        $this->instance->setEmployee($value);
        return $this;
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
     * Initializes a new Retrieve Employee Response object.
     */
    public function build(): RetrieveEmployeeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
