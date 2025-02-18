<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LinkCustomerToGiftCardRequest;

/**
 * Builder for model LinkCustomerToGiftCardRequest
 *
 * @see LinkCustomerToGiftCardRequest
 */
class LinkCustomerToGiftCardRequestBuilder
{
    /**
     * @var LinkCustomerToGiftCardRequest
     */
    private $instance;

    private function __construct(LinkCustomerToGiftCardRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Link Customer To Gift Card Request Builder object.
     *
     * @param string $customerId
     */
    public static function init(string $customerId): self
    {
        return new self(new LinkCustomerToGiftCardRequest($customerId));
    }

    /**
     * Initializes a new Link Customer To Gift Card Request object.
     */
    public function build(): LinkCustomerToGiftCardRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
