<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SelectOption;

/**
 * Builder for model SelectOption
 *
 * @see SelectOption
 */
class SelectOptionBuilder
{
    /**
     * @var SelectOption
     */
    private $instance;

    private function __construct(SelectOption $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new select option Builder object.
     */
    public static function init(string $referenceId, string $title): self
    {
        return new self(new SelectOption($referenceId, $title));
    }

    /**
     * Initializes a new select option object.
     */
    public function build(): SelectOption
    {
        return CoreHelper::clone($this->instance);
    }
}
