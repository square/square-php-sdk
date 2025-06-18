<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CatalogVersionUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?CatalogVersionUpdatedEventObject $object An object containing fields and values relevant to the event. Is absent if affected object was deleted.
     */
    #[JsonProperty('object')]
    private ?CatalogVersionUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   object?: ?CatalogVersionUpdatedEventObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?CatalogVersionUpdatedEventObject
     */
    public function getObject(): ?CatalogVersionUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?CatalogVersionUpdatedEventObject $value
     */
    public function setObject(?CatalogVersionUpdatedEventObject $value = null): self
    {
        $this->object = $value;
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
