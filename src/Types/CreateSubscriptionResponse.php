<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines output parameters in a response from the
 * [CreateSubscription](api-endpoint:Subscriptions-CreateSubscription) endpoint.
 */
class CreateSubscriptionResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The newly created subscription.
     *
     * For more information, see
     * [Subscription object](https://developer.squareup.com/docs/subscriptions-api/manage-subscriptions#subscription-object).
     *
     * @var ?Subscription $subscription
     */
    #[JsonProperty('subscription')]
    private ?Subscription $subscription;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   subscription?: ?Subscription,
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
     * @return ?Subscription
     */
    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    /**
     * @param ?Subscription $value
     */
    public function setSubscription(?Subscription $value = null): self
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
