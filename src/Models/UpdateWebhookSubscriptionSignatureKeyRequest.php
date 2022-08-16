<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Updates a [Subscription]($m/WebhookSubscription) by replacing the existing signature key with a new
 * one.
 */
class UpdateWebhookSubscriptionSignatureKeyRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * Returns Idempotency Key.
     * A unique string that identifies the
     * [UpdateWebhookSubscriptionSignatureKey]($e/WebhookSubscriptions/UpdateWebhookSubscriptionSignatureKe
     * y) request.
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     * A unique string that identifies the
     * [UpdateWebhookSubscriptionSignatureKey]($e/WebhookSubscriptions/UpdateWebhookSubscriptionSignatureKe
     * y) request.
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
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
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
