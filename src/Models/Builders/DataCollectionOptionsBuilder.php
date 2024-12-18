<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CollectedData;
use Square\Models\DataCollectionOptions;

/**
 * Builder for model DataCollectionOptions
 *
 * @see DataCollectionOptions
 */
class DataCollectionOptionsBuilder
{
    /**
     * @var DataCollectionOptions
     */
    private $instance;

    private function __construct(DataCollectionOptions $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Data Collection Options Builder object.
     *
     * @param string $title
     * @param string $body
     * @param string $inputType
     */
    public static function init(string $title, string $body, string $inputType): self
    {
        return new self(new DataCollectionOptions($title, $body, $inputType));
    }

    /**
     * Sets collected data field.
     *
     * @param CollectedData|null $value
     */
    public function collectedData(?CollectedData $value): self
    {
        $this->instance->setCollectedData($value);
        return $this;
    }

    /**
     * Initializes a new Data Collection Options object.
     */
    public function build(): DataCollectionOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
