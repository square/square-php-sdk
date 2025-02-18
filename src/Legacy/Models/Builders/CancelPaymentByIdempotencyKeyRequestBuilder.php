<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CancelPaymentByIdempotencyKeyRequest;

/**
 * Builder for model CancelPaymentByIdempotencyKeyRequest
 *
 * @see CancelPaymentByIdempotencyKeyRequest
 */
class CancelPaymentByIdempotencyKeyRequestBuilder
{
    /**
     * @var CancelPaymentByIdempotencyKeyRequest
     */
    private $instance;

    private function __construct(CancelPaymentByIdempotencyKeyRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Cancel Payment By Idempotency Key Request Builder object.
     *
     * @param string $idempotencyKey
     */
    public static function init(string $idempotencyKey): self
    {
        return new self(new CancelPaymentByIdempotencyKeyRequest($idempotencyKey));
    }

    /**
     * Initializes a new Cancel Payment By Idempotency Key Request object.
     */
    public function build(): CancelPaymentByIdempotencyKeyRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
