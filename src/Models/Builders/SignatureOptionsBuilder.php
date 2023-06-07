<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SignatureOptions;

/**
 * Builder for model SignatureOptions
 *
 * @see SignatureOptions
 */
class SignatureOptionsBuilder
{
    /**
     * @var SignatureOptions
     */
    private $instance;

    private function __construct(SignatureOptions $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new signature options Builder object.
     */
    public static function init(string $title, string $body): self
    {
        return new self(new SignatureOptions($title, $body));
    }

    /**
     * Sets signature field.
     */
    public function signature(?array $value): self
    {
        $this->instance->setSignature($value);
        return $this;
    }

    /**
     * Initializes a new signature options object.
     */
    public function build(): SignatureOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
