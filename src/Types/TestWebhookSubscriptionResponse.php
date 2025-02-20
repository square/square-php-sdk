<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [TestWebhookSubscription](api-endpoint:WebhookSubscriptions-TestWebhookSubscription) endpoint.
 *
 * Note: If there are errors processing the request, the [SubscriptionTestResult](entity:SubscriptionTestResult) field is not
 * present.
 */
class TestWebhookSubscriptionResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?SubscriptionTestResult $subscriptionTestResult The [SubscriptionTestResult](entity:SubscriptionTestResult).
     */
    #[JsonProperty('subscription_test_result')]
    private ?SubscriptionTestResult $subscriptionTestResult;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   subscriptionTestResult?: ?SubscriptionTestResult,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->subscriptionTestResult = $values['subscriptionTestResult'] ?? null;
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
     * @return ?SubscriptionTestResult
     */
    public function getSubscriptionTestResult(): ?SubscriptionTestResult
    {
        return $this->subscriptionTestResult;
    }

    /**
     * @param ?SubscriptionTestResult $value
     */
    public function setSubscriptionTestResult(?SubscriptionTestResult $value = null): self
    {
        $this->subscriptionTestResult = $value;
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
