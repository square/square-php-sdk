<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\PaymentLink;
use Square\Legacy\Models\RetrievePaymentLinkResponse;

/**
 * Builder for model RetrievePaymentLinkResponse
 *
 * @see RetrievePaymentLinkResponse
 */
class RetrievePaymentLinkResponseBuilder
{
    /**
     * @var RetrievePaymentLinkResponse
     */
    private $instance;

    private function __construct(RetrievePaymentLinkResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Payment Link Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrievePaymentLinkResponse());
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
     * Sets payment link field.
     *
     * @param PaymentLink|null $value
     */
    public function paymentLink(?PaymentLink $value): self
    {
        $this->instance->setPaymentLink($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Payment Link Response object.
     */
    public function build(): RetrievePaymentLinkResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
