<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListDevicesRequest;

/**
 * Builder for model ListDevicesRequest
 *
 * @see ListDevicesRequest
 */
class ListDevicesRequestBuilder
{
    /**
     * @var ListDevicesRequest
     */
    private $instance;

    private function __construct(ListDevicesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list devices request Builder object.
     */
    public static function init(): self
    {
        return new self(new ListDevicesRequest());
    }

    /**
     * Sets cursor field.
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Unsets cursor field.
     */
    public function unsetCursor(): self
    {
        $this->instance->unsetCursor();
        return $this;
    }

    /**
     * Sets sort order field.
     */
    public function sortOrder(?string $value): self
    {
        $this->instance->setSortOrder($value);
        return $this;
    }

    /**
     * Sets limit field.
     */
    public function limit(?int $value): self
    {
        $this->instance->setLimit($value);
        return $this;
    }

    /**
     * Unsets limit field.
     */
    public function unsetLimit(): self
    {
        $this->instance->unsetLimit();
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
     * Initializes a new list devices request object.
     */
    public function build(): ListDevicesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
