<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SelectOption;
use Square\Models\SelectOptions;

/**
 * Builder for model SelectOptions
 *
 * @see SelectOptions
 */
class SelectOptionsBuilder
{
    /**
     * @var SelectOptions
     */
    private $instance;

    private function __construct(SelectOptions $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new select options Builder object.
     */
    public static function init(string $title, string $body, array $options): self
    {
        return new self(new SelectOptions($title, $body, $options));
    }

    /**
     * Sets selected option field.
     */
    public function selectedOption(?SelectOption $value): self
    {
        $this->instance->setSelectedOption($value);
        return $this;
    }

    /**
     * Initializes a new select options object.
     */
    public function build(): SelectOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
