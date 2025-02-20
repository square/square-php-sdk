<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class BulkSwapPlanRequest extends JsonSerializableType
{
    /**
     * The ID of the new subscription plan variation.
     *
     * This field is required.
     *
     * @var string $newPlanVariationId
     */
    #[JsonProperty('new_plan_variation_id')]
    private string $newPlanVariationId;

    /**
     * The ID of the plan variation whose subscriptions should be swapped. Active subscriptions
     * using this plan variation will be subscribed to the new plan variation on their next billing
     * day.
     *
     * @var string $oldPlanVariationId
     */
    #[JsonProperty('old_plan_variation_id')]
    private string $oldPlanVariationId;

    /**
     * @var string $locationId The ID of the location to associate with the swapped subscriptions.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @param array{
     *   newPlanVariationId: string,
     *   oldPlanVariationId: string,
     *   locationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newPlanVariationId = $values['newPlanVariationId'];
        $this->oldPlanVariationId = $values['oldPlanVariationId'];
        $this->locationId = $values['locationId'];
    }

    /**
     * @return string
     */
    public function getNewPlanVariationId(): string
    {
        return $this->newPlanVariationId;
    }

    /**
     * @param string $value
     */
    public function setNewPlanVariationId(string $value): self
    {
        $this->newPlanVariationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOldPlanVariationId(): string
    {
        return $this->oldPlanVariationId;
    }

    /**
     * @param string $value
     */
    public function setOldPlanVariationId(string $value): self
    {
        $this->oldPlanVariationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }
}
