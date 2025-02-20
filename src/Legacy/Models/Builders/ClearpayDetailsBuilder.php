<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\ClearpayDetails;

/**
 * Builder for model ClearpayDetails
 *
 * @see ClearpayDetails
 */
class ClearpayDetailsBuilder
{
    /**
     * @var ClearpayDetails
     */
    private $instance;

    private function __construct(ClearpayDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Clearpay Details Builder object.
     */
    public static function init(): self
    {
        return new self(new ClearpayDetails());
    }

    /**
     * Sets email address field.
     *
     * @param string|null $value
     */
    public function emailAddress(?string $value): self
    {
        $this->instance->setEmailAddress($value);
        return $this;
    }

    /**
     * Unsets email address field.
     */
    public function unsetEmailAddress(): self
    {
        $this->instance->unsetEmailAddress();
        return $this;
    }

    /**
     * Initializes a new Clearpay Details object.
     */
    public function build(): ClearpayDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
