<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a subscription plan variation. A subscription plan variation represents how the
 * subscription for a product or service is sold.
 * For more information, see [Subscription Plans and Variations](https://developer.squareup.
 * com/docs/subscriptions-api/plans-and-variations).
 */
class CatalogSubscriptionPlanVariation implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var SubscriptionPhase[]
     */
    private $phases;

    /**
     * @var array
     */
    private $subscriptionPlanId = [];

    /**
     * @param string $name
     * @param SubscriptionPhase[] $phases
     */
    public function __construct(string $name, array $phases)
    {
        $this->name = $name;
        $this->phases = $phases;
    }

    /**
     * Returns Name.
     * The name of the plan variation.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     * The name of the plan variation.
     *
     * @required
     * @maps name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Phases.
     * A list containing each [SubscriptionPhase](entity:SubscriptionPhase) for this plan variation.
     *
     * @return SubscriptionPhase[]
     */
    public function getPhases(): array
    {
        return $this->phases;
    }

    /**
     * Sets Phases.
     * A list containing each [SubscriptionPhase](entity:SubscriptionPhase) for this plan variation.
     *
     * @required
     * @maps phases
     *
     * @param SubscriptionPhase[] $phases
     */
    public function setPhases(array $phases): void
    {
        $this->phases = $phases;
    }

    /**
     * Returns Subscription Plan Id.
     * The id of the subscription plan, if there is one.
     */
    public function getSubscriptionPlanId(): ?string
    {
        if (count($this->subscriptionPlanId) == 0) {
            return null;
        }
        return $this->subscriptionPlanId['value'];
    }

    /**
     * Sets Subscription Plan Id.
     * The id of the subscription plan, if there is one.
     *
     * @maps subscription_plan_id
     */
    public function setSubscriptionPlanId(?string $subscriptionPlanId): void
    {
        $this->subscriptionPlanId['value'] = $subscriptionPlanId;
    }

    /**
     * Unsets Subscription Plan Id.
     * The id of the subscription plan, if there is one.
     */
    public function unsetSubscriptionPlanId(): void
    {
        $this->subscriptionPlanId = [];
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
        $json['name']                     = $this->name;
        $json['phases']                   = $this->phases;
        if (!empty($this->subscriptionPlanId)) {
            $json['subscription_plan_id'] = $this->subscriptionPlanId['value'];
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
