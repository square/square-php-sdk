<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceStatus extends JsonSerializableType
{
    /**
     *
     * See [Category](#type-category) for possible values
     *
     * @var ?value-of<DeviceStatusCategory> $category
     */
    #[JsonProperty('category')]
    private ?string $category;

    /**
     * @param array{
     *   category?: ?value-of<DeviceStatusCategory>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->category = $values['category'] ?? null;
    }

    /**
     * @return ?value-of<DeviceStatusCategory>
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param ?value-of<DeviceStatusCategory> $value
     */
    public function setCategory(?string $value = null): self
    {
        $this->category = $value;
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
