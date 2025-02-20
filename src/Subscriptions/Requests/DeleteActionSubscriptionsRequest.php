<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteActionSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription the targeted action is to act upon.
     */
    private string $subscriptionId;

    /**
     * @var string $actionId The ID of the targeted action to be deleted.
     */
    private string $actionId;

    /**
     * @param array{
     *   subscriptionId: string,
     *   actionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->actionId = $values['actionId'];
    }

    /**
     * @return string
     */
    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $value
     */
    public function setSubscriptionId(string $value): self
    {
        $this->subscriptionId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getActionId(): string
    {
        return $this->actionId;
    }

    /**
     * @param string $value
     */
    public function setActionId(string $value): self
    {
        $this->actionId = $value;
        return $this;
    }
}
