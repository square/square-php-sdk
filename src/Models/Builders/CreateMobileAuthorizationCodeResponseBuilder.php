<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateMobileAuthorizationCodeResponse;

/**
 * Builder for model CreateMobileAuthorizationCodeResponse
 *
 * @see CreateMobileAuthorizationCodeResponse
 */
class CreateMobileAuthorizationCodeResponseBuilder
{
    /**
     * @var CreateMobileAuthorizationCodeResponse
     */
    private $instance;

    private function __construct(CreateMobileAuthorizationCodeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new create mobile authorization code response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateMobileAuthorizationCodeResponse());
    }

    /**
     * Sets authorization code field.
     */
    public function authorizationCode(?string $value): self
    {
        $this->instance->setAuthorizationCode($value);
        return $this;
    }

    /**
     * Sets expires at field.
     */
    public function expiresAt(?string $value): self
    {
        $this->instance->setExpiresAt($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new create mobile authorization code response object.
     */
    public function build(): CreateMobileAuthorizationCodeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
