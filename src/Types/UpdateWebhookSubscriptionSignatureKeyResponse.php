<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [UpdateWebhookSubscriptionSignatureKey](api-endpoint:WebhookSubscriptions-UpdateWebhookSubscriptionSignatureKey) endpoint.
 *
 * Note: If there are errors processing the request, the [Subscription](entity:WebhookSubscription) is not
 * present.
 */
class UpdateWebhookSubscriptionSignatureKeyResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?string $signatureKey The new Square-generated signature key used to validate the origin of the webhook event.
     */
    #[JsonProperty('signature_key')]
    private ?string $signatureKey;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   signatureKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->signatureKey = $values['signatureKey'] ?? null;
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
     * @return ?string
     */
    public function getSignatureKey(): ?string
    {
        return $this->signatureKey;
    }

    /**
     * @param ?string $value
     */
    public function setSignatureKey(?string $value = null): self
    {
        $this->signatureKey = $value;
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
