<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CollectedData;

/**
 * Builder for model CollectedData
 *
 * @see CollectedData
 */
class CollectedDataBuilder
{
    /**
     * @var CollectedData
     */
    private $instance;

    private function __construct(CollectedData $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new collected data Builder object.
     */
    public static function init(): self
    {
        return new self(new CollectedData());
    }

    /**
     * Sets input text field.
     */
    public function inputText(?string $value): self
    {
        $this->instance->setInputText($value);
        return $this;
    }

    /**
     * Initializes a new collected data object.
     */
    public function build(): CollectedData
    {
        return CoreHelper::clone($this->instance);
    }
}
