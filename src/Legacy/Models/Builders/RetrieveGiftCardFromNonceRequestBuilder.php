<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveGiftCardFromNonceRequest;

/**
 * Builder for model RetrieveGiftCardFromNonceRequest
 *
 * @see RetrieveGiftCardFromNonceRequest
 */
class RetrieveGiftCardFromNonceRequestBuilder
{
    /**
     * @var RetrieveGiftCardFromNonceRequest
     */
    private $instance;

    private function __construct(RetrieveGiftCardFromNonceRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Gift Card From Nonce Request Builder object.
     *
     * @param string $nonce
     */
    public static function init(string $nonce): self
    {
        return new self(new RetrieveGiftCardFromNonceRequest($nonce));
    }

    /**
     * Initializes a new Retrieve Gift Card From Nonce Request object.
     */
    public function build(): RetrieveGiftCardFromNonceRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
