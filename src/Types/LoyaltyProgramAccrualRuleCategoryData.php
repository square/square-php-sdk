<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents additional data for rules with the `CATEGORY` accrual type.
 */
class LoyaltyProgramAccrualRuleCategoryData extends JsonSerializableType
{
    /**
     * The ID of the `CATEGORY` [catalog object](entity:CatalogObject) that buyers can purchase to earn
     * points.
     *
     * @var string $categoryId
     */
    #[JsonProperty('category_id')]
    private string $categoryId;

    /**
     * @param array{
     *   categoryId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->categoryId = $values['categoryId'];
    }

    /**
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @param string $value
     */
    public function setCategoryId(string $value): self
    {
        $this->categoryId = $value;
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
