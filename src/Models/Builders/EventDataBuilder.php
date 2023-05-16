<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\EventData;

/**
 * Builder for model EventData
 *
 * @see EventData
 */
class EventDataBuilder
{
    /**
     * @var EventData
     */
    private $instance;

    private function __construct(EventData $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new event data Builder object.
     */
    public static function init(): self
    {
        return new self(new EventData());
    }

    /**
     * Sets type field.
     */
    public function type(?string $value): self
    {
        $this->instance->setType($value);
        return $this;
    }

    /**
     * Unsets type field.
     */
    public function unsetType(): self
    {
        $this->instance->unsetType();
        return $this;
    }

    /**
     * Sets id field.
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets deleted field.
     */
    public function deleted(?bool $value): self
    {
        $this->instance->setDeleted($value);
        return $this;
    }

    /**
     * Unsets deleted field.
     */
    public function unsetDeleted(): self
    {
        $this->instance->unsetDeleted();
        return $this;
    }

    /**
     * Sets object field.
     */
    public function object($value): self
    {
        $this->instance->setObject($value);
        return $this;
    }

    /**
     * Unsets object field.
     */
    public function unsetObject(): self
    {
        $this->instance->unsetObject();
        return $this;
    }

    /**
     * Initializes a new event data object.
     */
    public function build(): EventData
    {
        return CoreHelper::clone($this->instance);
    }
}
