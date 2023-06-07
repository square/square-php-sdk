<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ConfirmationDecision;

/**
 * Builder for model ConfirmationDecision
 *
 * @see ConfirmationDecision
 */
class ConfirmationDecisionBuilder
{
    /**
     * @var ConfirmationDecision
     */
    private $instance;

    private function __construct(ConfirmationDecision $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new confirmation decision Builder object.
     */
    public static function init(): self
    {
        return new self(new ConfirmationDecision());
    }

    /**
     * Sets has agreed field.
     */
    public function hasAgreed(?bool $value): self
    {
        $this->instance->setHasAgreed($value);
        return $this;
    }

    /**
     * Initializes a new confirmation decision object.
     */
    public function build(): ConfirmationDecision
    {
        return CoreHelper::clone($this->instance);
    }
}
