<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes changes to subscription and billing states.
 */
class SubscriptionEvent implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $subscriptionEventType;

    /**
     * @var string
     */
    private $effectiveDate;

    /**
     * @var string
     */
    private $planId;

    /**
     * @var SubscriptionEventInfo|null
     */
    private $info;

    /**
     * @param string $id
     * @param string $subscriptionEventType
     * @param string $effectiveDate
     * @param string $planId
     */
    public function __construct(string $id, string $subscriptionEventType, string $effectiveDate, string $planId)
    {
        $this->id = $id;
        $this->subscriptionEventType = $subscriptionEventType;
        $this->effectiveDate = $effectiveDate;
        $this->planId = $planId;
    }

    /**
     * Returns Id.
     *
     * The ID of the subscription event.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The ID of the subscription event.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Subscription Event Type.
     *
     * The possible subscription event types.
     */
    public function getSubscriptionEventType(): string
    {
        return $this->subscriptionEventType;
    }

    /**
     * Sets Subscription Event Type.
     *
     * The possible subscription event types.
     *
     * @required
     * @maps subscription_event_type
     */
    public function setSubscriptionEventType(string $subscriptionEventType): void
    {
        $this->subscriptionEventType = $subscriptionEventType;
    }

    /**
     * Returns Effective Date.
     *
     * The date, in YYYY-MM-DD format (for
     * example, 2013-01-15), when the subscription event went into effect.
     */
    public function getEffectiveDate(): string
    {
        return $this->effectiveDate;
    }

    /**
     * Sets Effective Date.
     *
     * The date, in YYYY-MM-DD format (for
     * example, 2013-01-15), when the subscription event went into effect.
     *
     * @required
     * @maps effective_date
     */
    public function setEffectiveDate(string $effectiveDate): void
    {
        $this->effectiveDate = $effectiveDate;
    }

    /**
     * Returns Plan Id.
     *
     * The ID of the subscription plan associated with the subscription.
     */
    public function getPlanId(): string
    {
        return $this->planId;
    }

    /**
     * Sets Plan Id.
     *
     * The ID of the subscription plan associated with the subscription.
     *
     * @required
     * @maps plan_id
     */
    public function setPlanId(string $planId): void
    {
        $this->planId = $planId;
    }

    /**
     * Returns Info.
     *
     * Provides information about the subscription event.
     */
    public function getInfo(): ?SubscriptionEventInfo
    {
        return $this->info;
    }

    /**
     * Sets Info.
     *
     * Provides information about the subscription event.
     *
     * @maps info
     */
    public function setInfo(?SubscriptionEventInfo $info): void
    {
        $this->info = $info;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                      = $this->id;
        $json['subscription_event_type'] = $this->subscriptionEventType;
        $json['effective_date']          = $this->effectiveDate;
        $json['plan_id']                 = $this->planId;
        if (isset($this->info)) {
            $json['info']                = $this->info;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
