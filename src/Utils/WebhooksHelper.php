<?php

namespace Square\Utils;

use Exception;

/**
 * Utility to help with Square Webhooks
 */
class WebhooksHelper
{
    /**
     * Verifies and validates an event notification.
     * See the documentation for more details.
     *
     * @param string $requestBody       The JSON body of the request.
     * @param string $signatureHeader   The value for the `x-square-hmacsha256-signature` header.
     * @param string $signatureKey      The signature key from the Square Developer portal for the webhook subscription.
     * @param string $notificationUrl   The notification endpoint URL as defined in the Square Developer portal for the webhook subscription.
     * @return bool                     `true` if the signature is valid, indicating that the event can be trusted as it came from Square. `false` if the signature validation fails, indicating that the event did not come from Square, so it may be malicious and should be discarded.
     * @throws Exception                If the signatureKey or notificationUrl is null or empty.
     */
    public static function verifySignature(
        string $requestBody,
        string $signatureHeader,
        string $signatureKey,
        string $notificationUrl
    ): bool {
        if (strlen($requestBody) === 0) {
            return false;
        }
        if (strlen($signatureKey) === 0) {
            throw new Exception('signatureKey is null or empty');
        }
        if (strlen($notificationUrl) === 0) {
            throw new Exception('notificationUrl is null or empty');
        }

        // Compute the payload.
        $payload = $notificationUrl . $requestBody;

        // Compute the hash value
        $hash = hash_hmac(
            algo: 'sha256',
            data: $payload,
            key: $signatureKey,
            binary: true
        );

        // Compare the computed hash vs the value in the signature header
        $hashBase64 = base64_encode($hash);

        return $hashBase64 === $signatureHeader;
    }
}
