<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Event;
use Square\Models\EventData;

/**
 * Builder for model Event
 *
 * @see Event
 */
class EventBuilder
{
    /**
     * @var Event
     */
    private $instance;

    private function __construct(Event $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new event Builder object.
     */
    public static function init(): self
    {
        return new self(new Event());
    }

    /**
     * Sets merchant id field.
     */
    public function merchantId(?string $value): self
    {
        $this->instance->setMerchantId($value);
        return $this;
    }

    /**
     * Unsets merchant id field.
     */
    public function unsetMerchantId(): self
    {
        $this->instance->unsetMerchantId();
        return $this;
    }

    /**
     * Sets location id field.
     */
    public function locationId(?string $value): self
    {
        $this->instance->setLocationId($value);
        return $this;
    }

    /**
     * Unsets location id field.
     */
    public function unsetLocationId(): self
    {
        $this->instance->unsetLocationId();
        return $this;
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
     * Sets event id field.
     */
    public function eventId(?string $value): self
    {
        $this->instance->setEventId($value);
        return $this;
    }

    /**
     * Unsets event id field.
     */
    public function unsetEventId(): self
    {
        $this->instance->unsetEventId();
        return $this;
    }

    /**
     * Sets created at field.
     */
    public function createdAt(?string $value): self
    {
        $this->instance->setCreatedAt($value);
        return $this;
    }

    /**
     * Sets data field.
     */
    public function data(?EventData $value): self
    {
        $this->instance->setData($value);
        return $this;
    }

    /**
     * Initializes a new event object.
     */
    public function build(): Event
    {
        return CoreHelper::clone($this->instance);
    }
}
