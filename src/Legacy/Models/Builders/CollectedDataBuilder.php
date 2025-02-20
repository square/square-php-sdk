<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CollectedData;

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
     * Initializes a new Collected Data Builder object.
     */
    public static function init(): self
    {
        return new self(new CollectedData());
    }

    /**
     * Sets input text field.
     *
     * @param string|null $value
     */
    public function inputText(?string $value): self
    {
        $this->instance->setInputText($value);
        return $this;
    }

    /**
     * Initializes a new Collected Data object.
     */
    public function build(): CollectedData
    {
        return CoreHelper::clone($this->instance);
    }
}
