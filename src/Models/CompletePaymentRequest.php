<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a request to complete (capture) a payment using
 * [CompletePayment]($e/Payments/CompletePayment).
 *
 * By default, payments are set to `autocomplete` immediately after they are created.
 * To complete payments manually, set `autocomplete` to `false`.
 */
class CompletePaymentRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $versionToken;

    /**
     * Returns Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies the current `Payment`
     * version that the caller expects. If the server has a different version of the Payment,
     * the update fails and a response with a VERSION_MISMATCH error is returned.
     */
    public function getVersionToken(): ?string
    {
        return $this->versionToken;
    }

    /**
     * Sets Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies the current `Payment`
     * version that the caller expects. If the server has a different version of the Payment,
     * the update fails and a response with a VERSION_MISMATCH error is returned.
     *
     * @maps version_token
     */
    public function setVersionToken(?string $versionToken): void
    {
        $this->versionToken = $versionToken;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->versionToken)) {
            $json['version_token'] = $this->versionToken;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
