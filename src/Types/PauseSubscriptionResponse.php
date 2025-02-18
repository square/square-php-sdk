<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines output parameters in a response from the
 * [PauseSubscription](api-endpoint:Subscriptions-PauseSubscription) endpoint.
 */
class PauseSubscriptionResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Subscription $subscription The subscription to be paused by the scheduled `PAUSE` action.
     */
    #[JsonProperty('subscription')]
    private ?Subscription $subscription;

    /**
     * @var ?array<SubscriptionAction> $actions The list of a `PAUSE` action and a possible `RESUME` action created by the request.
     */
    #[JsonProperty('actions'), ArrayType([SubscriptionAction::class])]
    private ?array $actions;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   subscription?: ?Subscription,
     *   actions?: ?array<SubscriptionAction>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->subscription = $values['subscription'] ?? null;
        $this->actions = $values['actions'] ?? null;
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
     * @return ?array<SubscriptionAction>
     */
    public function getActions(): ?array
    {
        return $this->actions;
    }

    /**
     * @param ?array<SubscriptionAction> $value
     */
    public function setActions(?array $value = null): self
    {
        $this->actions = $value;
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
