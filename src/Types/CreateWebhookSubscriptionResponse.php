<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [CreateWebhookSubscription](api-endpoint:WebhookSubscriptions-CreateWebhookSubscription) endpoint.
 *
 * Note: if there are errors processing the request, the [Subscription](entity:WebhookSubscription) will not be
 * present.
 */
class CreateWebhookSubscriptionResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?WebhookSubscription $subscription The new [Subscription](entity:WebhookSubscription).
     */
    #[JsonProperty('subscription')]
    private ?WebhookSubscription $subscription;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   subscription?: ?WebhookSubscription,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->subscription = $values['subscription'] ?? null;
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
     * @return ?WebhookSubscription
     */
    public function getSubscription(): ?WebhookSubscription
    {
        return $this->subscription;
    }

    /**
     * @param ?WebhookSubscription $value
     */
    public function setSubscription(?WebhookSubscription $value = null): self
    {
        $this->subscription = $value;
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
