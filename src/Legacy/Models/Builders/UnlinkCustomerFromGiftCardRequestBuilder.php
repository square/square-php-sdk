<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\UnlinkCustomerFromGiftCardRequest;

/**
 * Builder for model UnlinkCustomerFromGiftCardRequest
 *
 * @see UnlinkCustomerFromGiftCardRequest
 */
class UnlinkCustomerFromGiftCardRequestBuilder
{
    /**
     * @var UnlinkCustomerFromGiftCardRequest
     */
    private $instance;

    private function __construct(UnlinkCustomerFromGiftCardRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Unlink Customer From Gift Card Request Builder object.
     *
     * @param string $customerId
     */
    public static function init(string $customerId): self
    {
        return new self(new UnlinkCustomerFromGiftCardRequest($customerId));
    }

    /**
     * Initializes a new Unlink Customer From Gift Card Request object.
     */
    public function build(): UnlinkCustomerFromGiftCardRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
