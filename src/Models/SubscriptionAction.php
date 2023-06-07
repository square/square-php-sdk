<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents an action as a pending change to a subscription.
 */
class SubscriptionAction implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var array
     */
    private $effectiveDate = [];

    /**
     * @var array
     */
    private $phases = [];

    /**
     * @var array
     */
    private $newPlanVariationId = [];

    /**
     * Returns Id.
     * The ID of an action scoped to a subscription.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     * The ID of an action scoped to a subscription.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Type.
     * Supported types of an action as a pending change to a subscription.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     * Supported types of an action as a pending change to a subscription.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Effective Date.
     * The `YYYY-MM-DD`-formatted date when the action occurs on the subscription.
     */
    public function getEffectiveDate(): ?string
    {
        if (count($this->effectiveDate) == 0) {
            return null;
        }
        return $this->effectiveDate['value'];
    }

    /**
     * Sets Effective Date.
     * The `YYYY-MM-DD`-formatted date when the action occurs on the subscription.
     *
     * @maps effective_date
     */
    public function setEffectiveDate(?string $effectiveDate): void
    {
        $this->effectiveDate['value'] = $effectiveDate;
    }

    /**
     * Unsets Effective Date.
     * The `YYYY-MM-DD`-formatted date when the action occurs on the subscription.
     */
    public function unsetEffectiveDate(): void
    {
        $this->effectiveDate = [];
    }

    /**
     * Returns Phases.
     * A list of Phases, to pass phase-specific information used in the swap.
     *
     * @return Phase[]|null
     */
    public function getPhases(): ?array
    {
        if (count($this->phases) == 0) {
            return null;
        }
        return $this->phases['value'];
    }

    /**
     * Sets Phases.
     * A list of Phases, to pass phase-specific information used in the swap.
     *
     * @maps phases
     *
     * @param Phase[]|null $phases
     */
    public function setPhases(?array $phases): void
    {
        $this->phases['value'] = $phases;
    }

    /**
     * Unsets Phases.
     * A list of Phases, to pass phase-specific information used in the swap.
     */
    public function unsetPhases(): void
    {
        $this->phases = [];
    }

    /**
     * Returns New Plan Variation Id.
     * The target subscription plan variation that a subscription switches to, for a `SWAP_PLAN` action.
     */
    public function getNewPlanVariationId(): ?string
    {
        if (count($this->newPlanVariationId) == 0) {
            return null;
        }
        return $this->newPlanVariationId['value'];
    }

    /**
     * Sets New Plan Variation Id.
     * The target subscription plan variation that a subscription switches to, for a `SWAP_PLAN` action.
     *
     * @maps new_plan_variation_id
     */
    public function setNewPlanVariationId(?string $newPlanVariationId): void
    {
        $this->newPlanVariationId['value'] = $newPlanVariationId;
    }

    /**
     * Unsets New Plan Variation Id.
     * The target subscription plan variation that a subscription switches to, for a `SWAP_PLAN` action.
     */
    public function unsetNewPlanVariationId(): void
    {
        $this->newPlanVariationId = [];
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
        if (isset($this->id)) {
            $json['id']                    = $this->id;
        }
        if (isset($this->type)) {
            $json['type']                  = $this->type;
        }
        if (!empty($this->effectiveDate)) {
            $json['effective_date']        = $this->effectiveDate['value'];
        }
        if (!empty($this->phases)) {
            $json['phases']                = $this->phases['value'];
        }
        if (!empty($this->newPlanVariationId)) {
            $json['new_plan_variation_id'] = $this->newPlanVariationId['value'];
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
