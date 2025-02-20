<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\V1OrderHistoryEntry;

/**
 * Builder for model V1OrderHistoryEntry
 *
 * @see V1OrderHistoryEntry
 */
class V1OrderHistoryEntryBuilder
{
    /**
     * @var V1OrderHistoryEntry
     */
    private $instance;

    private function __construct(V1OrderHistoryEntry $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new V1 Order History Entry Builder object.
     */
    public static function init(): self
    {
        return new self(new V1OrderHistoryEntry());
    }

    /**
     * Sets action field.
     *
     * @param string|null $value
     */
    public function action(?string $value): self
    {
        $this->instance->setAction($value);
        return $this;
    }

    /**
     * Sets created at field.
     *
     * @param string|null $value
     */
    public function createdAt(?string $value): self
    {
        $this->instance->setCreatedAt($value);
        return $this;
    }

    /**
     * Initializes a new V1 Order History Entry object.
     */
    public function build(): V1OrderHistoryEntry
    {
        return CoreHelper::clone($this->instance);
    }
}
