<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a subscription plan. For more information, see
 * [Set Up and Manage a Subscription Plan](https://developer.squareup.com/docs/subscriptions-api/setup-
 * plan).
 */
class CatalogSubscriptionPlan implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var SubscriptionPhase[]|null
     */
    private $phases;

    /**
     * Returns Name.
     *
     * The name of the plan.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the plan.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Phases.
     *
     * A list of SubscriptionPhase containing the [SubscriptionPhase](#type-SubscriptionPhase) for this
     * plan.
     *
     * @return SubscriptionPhase[]|null
     */
    public function getPhases(): ?array
    {
        return $this->phases;
    }

    /**
     * Sets Phases.
     *
     * A list of SubscriptionPhase containing the [SubscriptionPhase](#type-SubscriptionPhase) for this
     * plan.
     *
     * @maps phases
     *
     * @param SubscriptionPhase[]|null $phases
     */
    public function setPhases(?array $phases): void
    {
        $this->phases = $phases;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['name']   = $this->name;
        $json['phases'] = $this->phases;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
