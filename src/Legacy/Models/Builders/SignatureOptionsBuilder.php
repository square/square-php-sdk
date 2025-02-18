<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SignatureImage;
use Square\Legacy\Models\SignatureOptions;

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
     * Initializes a new Signature Options Builder object.
     *
     * @param string $title
     * @param string $body
     */
    public static function init(string $title, string $body): self
    {
        return new self(new SignatureOptions($title, $body));
    }

    /**
     * Sets signature field.
     *
     * @param SignatureImage[]|null $value
     */
    public function signature(?array $value): self
    {
        $this->instance->setSignature($value);
        return $this;
    }

    /**
     * Initializes a new Signature Options object.
     */
    public function build(): SignatureOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
