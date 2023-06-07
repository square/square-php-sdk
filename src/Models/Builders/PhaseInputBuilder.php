<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\PhaseInput;

/**
 * Builder for model PhaseInput
 *
 * @see PhaseInput
 */
class PhaseInputBuilder
{
    /**
     * @var PhaseInput
     */
    private $instance;

    private function __construct(PhaseInput $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new phase input Builder object.
     */
    public static function init(int $ordinal): self
    {
        return new self(new PhaseInput($ordinal));
    }

    /**
     * Sets order template id field.
     */
    public function orderTemplateId(?string $value): self
    {
        $this->instance->setOrderTemplateId($value);
        return $this;
    }

    /**
     * Unsets order template id field.
     */
    public function unsetOrderTemplateId(): self
    {
        $this->instance->unsetOrderTemplateId();
        return $this;
    }

    /**
     * Initializes a new phase input object.
     */
    public function build(): PhaseInput
    {
        return CoreHelper::clone($this->instance);
    }
}
