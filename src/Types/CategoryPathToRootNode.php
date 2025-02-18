<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A node in the path from a retrieved category to its root node.
 */
class CategoryPathToRootNode extends JsonSerializableType
{
    /**
     * @var ?string $categoryId The category's ID.
     */
    #[JsonProperty('category_id')]
    private ?string $categoryId;

    /**
     * @var ?string $categoryName The category's name.
     */
    #[JsonProperty('category_name')]
    private ?string $categoryName;

    /**
     * @param array{
     *   categoryId?: ?string,
     *   categoryName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->categoryId = $values['categoryId'] ?? null;
        $this->categoryName = $values['categoryName'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    /**
     * @param ?string $value
     */
    public function setCategoryId(?string $value = null): self
    {
        $this->categoryId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    /**
     * @param ?string $value
     */
    public function setCategoryName(?string $value = null): self
    {
        $this->categoryName = $value;
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
