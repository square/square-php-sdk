<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents additional data for rules with the `ITEM_VARIATION` accrual type.
 */
class LoyaltyProgramAccrualRuleItemVariationData extends JsonSerializableType
{
    /**
     * The ID of the `ITEM_VARIATION` [catalog object](entity:CatalogObject) that buyers can purchase to earn
     * points.
     *
     * @var string $itemVariationId
     */
    #[JsonProperty('item_variation_id')]
    private string $itemVariationId;

    /**
     * @param array{
     *   itemVariationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->itemVariationId = $values['itemVariationId'];
    }

    /**
     * @return string
     */
    public function getItemVariationId(): string
    {
        return $this->itemVariationId;
    }

    /**
     * @param string $value
     */
    public function setItemVariationId(string $value): self
    {
        $this->itemVariationId = $value;
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
