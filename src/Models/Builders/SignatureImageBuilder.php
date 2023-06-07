<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SignatureImage;

/**
 * Builder for model SignatureImage
 *
 * @see SignatureImage
 */
class SignatureImageBuilder
{
    /**
     * @var SignatureImage
     */
    private $instance;

    private function __construct(SignatureImage $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new signature image Builder object.
     */
    public static function init(): self
    {
        return new self(new SignatureImage());
    }

    /**
     * Sets image type field.
     */
    public function imageType(?string $value): self
    {
        $this->instance->setImageType($value);
        return $this;
    }

    /**
     * Sets data field.
     */
    public function data(?string $value): self
    {
        $this->instance->setData($value);
        return $this;
    }

    /**
     * Initializes a new signature image object.
     */
    public function build(): SignatureImage
    {
        return CoreHelper::clone($this->instance);
    }
}
