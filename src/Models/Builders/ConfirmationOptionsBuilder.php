<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ConfirmationDecision;
use Square\Models\ConfirmationOptions;

/**
 * Builder for model ConfirmationOptions
 *
 * @see ConfirmationOptions
 */
class ConfirmationOptionsBuilder
{
    /**
     * @var ConfirmationOptions
     */
    private $instance;

    private function __construct(ConfirmationOptions $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new confirmation options Builder object.
     */
    public static function init(string $title, string $body, string $agreeButtonText): self
    {
        return new self(new ConfirmationOptions($title, $body, $agreeButtonText));
    }

    /**
     * Sets disagree button text field.
     */
    public function disagreeButtonText(?string $value): self
    {
        $this->instance->setDisagreeButtonText($value);
        return $this;
    }

    /**
     * Unsets disagree button text field.
     */
    public function unsetDisagreeButtonText(): self
    {
        $this->instance->unsetDisagreeButtonText();
        return $this;
    }

    /**
     * Sets decision field.
     */
    public function decision(?ConfirmationDecision $value): self
    {
        $this->instance->setDecision($value);
        return $this;
    }

    /**
     * Initializes a new confirmation options object.
     */
    public function build(): ConfirmationOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
