<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [CreateRefund](#endpoint-createrefund) endpoint.
 *
 * One of `errors` or `refund` is present in a given response (never both).
 */
class CreateRefundResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Refund|null
     */
    private $refund;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Refund.
     *
     * Represents a refund processed for a Square transaction.
     */
    public function getRefund(): ?Refund
    {
        return $this->refund;
    }

    /**
     * Sets Refund.
     *
     * Represents a refund processed for a Square transaction.
     *
     * @maps refund
     */
    public function setRefund(?Refund $refund): void
    {
        $this->refund = $refund;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors'] = $this->errors;
        $json['refund'] = $this->refund;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
