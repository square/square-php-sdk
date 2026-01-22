<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of a request to the TestWebhookSubscription endpoint.
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
     * @var ?string $notificationUrl The URL that was used for the webhook notification test.
     */
    #[JsonProperty('notification_url')]
    private ?string $notificationUrl;

    /**
     * @var ?int $statusCode The HTTP status code returned by the notification URL.
     */
    #[JsonProperty('status_code')]
    private ?int $statusCode;

    /**
     * @var ?bool $passesFilter Whether the notification passed any configured filters.
     */
    #[JsonProperty('passes_filter')]
    private ?bool $passesFilter;

    /**
     * @var ?array<string, mixed> $payload The payload that was sent in the test notification.
     */
    #[JsonProperty('payload'), ArrayType(['string' => 'mixed'])]
    private ?array $payload;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   subscriptionTestResult?: ?SubscriptionTestResult,
     *   notificationUrl?: ?string,
     *   statusCode?: ?int,
     *   passesFilter?: ?bool,
     *   payload?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->subscriptionTestResult = $values['subscriptionTestResult'] ?? null;
        $this->notificationUrl = $values['notificationUrl'] ?? null;
        $this->statusCode = $values['statusCode'] ?? null;
        $this->passesFilter = $values['passesFilter'] ?? null;
        $this->payload = $values['payload'] ?? null;
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
     * @return ?string
     */
    public function getNotificationUrl(): ?string
    {
        return $this->notificationUrl;
    }

    /**
     * @param ?string $value
     */
    public function setNotificationUrl(?string $value = null): self
    {
        $this->notificationUrl = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param ?int $value
     */
    public function setStatusCode(?int $value = null): self
    {
        $this->statusCode = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getPassesFilter(): ?bool
    {
        return $this->passesFilter;
    }

    /**
     * @param ?bool $value
     */
    public function setPassesFilter(?bool $value = null): self
    {
        $this->passesFilter = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getPayload(): ?array
    {
        return $this->payload;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setPayload(?array $value = null): self
    {
        $this->payload = $value;
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
