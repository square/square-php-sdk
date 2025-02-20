<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveGiftCardFromGANRequest;

/**
 * Builder for model RetrieveGiftCardFromGANRequest
 *
 * @see RetrieveGiftCardFromGANRequest
 */
class RetrieveGiftCardFromGANRequestBuilder
{
    /**
     * @var RetrieveGiftCardFromGANRequest
     */
    private $instance;

    private function __construct(RetrieveGiftCardFromGANRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Gift Card From GAN Request Builder object.
     *
     * @param string $gan
     */
    public static function init(string $gan): self
    {
        return new self(new RetrieveGiftCardFromGANRequest($gan));
    }

    /**
     * Initializes a new Retrieve Gift Card From GAN Request object.
     */
    public function build(): RetrieveGiftCardFromGANRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
