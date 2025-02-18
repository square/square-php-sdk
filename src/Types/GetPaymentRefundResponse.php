<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the response returned by [GetRefund](api-endpoint:Refunds-GetPaymentRefund).
 *
 * Note: If there are errors processing the request, the refund field might not be
 * present or it might be present in a FAILED state.
 */
class GetPaymentRefundResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?PaymentRefund $refund The requested `PaymentRefund`.
     */
    #[JsonProperty('refund')]
    private ?PaymentRefund $refund;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   refund?: ?PaymentRefund,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->refund = $values['refund'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?PaymentRefund
     */
    public function getRefund(): ?PaymentRefund
    {
        return $this->refund;
    }

    /**
     * @param ?PaymentRefund $value
     */
    public function setRefund(?PaymentRefund $value = null): self
    {
        $this->refund = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
