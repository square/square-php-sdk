<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a subscription plan. For more information, see
 * [Set Up and Manage a Subscription Plan](https://developer.squareup.com/docs/subscriptions-api/setup-
 * plan).
 */
class CatalogSubscriptionPlan implements \JsonSerializable
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
     *
     * The name of the plan.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the plan.
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
     *
     * A list of SubscriptionPhase containing the [SubscriptionPhase]($m/SubscriptionPhase) for this plan.
     *
     * @return SubscriptionPhase[]
     */
    public function getPhases(): array
    {
        return $this->phases;
    }

    /**
     * Sets Phases.
     *
     * A list of SubscriptionPhase containing the [SubscriptionPhase]($m/SubscriptionPhase) for this plan.
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
        $json['name']   = $this->name;
        $json['phases'] = $this->phases;
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
