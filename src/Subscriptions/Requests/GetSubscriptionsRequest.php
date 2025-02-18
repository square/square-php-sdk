<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;

class GetSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription to retrieve.
     */
    private string $subscriptionId;

    /**
     * A query parameter to specify related information to be included in the response.
     *
     * The supported query parameter values are:
     *
     * - `actions`: to include scheduled actions on the targeted subscription.
     *
     * @var ?string $include
     */
    private ?string $include;

    /**
     * @param array{
     *   subscriptionId: string,
     *   include?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->include = $values['include'] ?? null;
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
     * @return ?string
     */
    public function getInclude(): ?string
    {
        return $this->include;
    }

    /**
     * @param ?string $value
     */
    public function setInclude(?string $value = null): self
    {
        $this->include = $value;
        return $this;
    }
}
