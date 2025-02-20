<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateMobileAuthorizationCodeResponse;
use Square\Legacy\Models\Error;

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
     * Initializes a new Create Mobile Authorization Code Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateMobileAuthorizationCodeResponse());
    }

    /**
     * Sets authorization code field.
     *
     * @param string|null $value
     */
    public function authorizationCode(?string $value): self
    {
        $this->instance->setAuthorizationCode($value);
        return $this;
    }

    /**
     * Sets expires at field.
     *
     * @param string|null $value
     */
    public function expiresAt(?string $value): self
    {
        $this->instance->setExpiresAt($value);
        return $this;
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new Create Mobile Authorization Code Response object.
     */
    public function build(): CreateMobileAuthorizationCodeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
