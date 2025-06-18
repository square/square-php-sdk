<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CardAutomaticallyUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of the event data object. The value is `"card"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the event data object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?CardAutomaticallyUpdatedEventObject $object An object containing the automatically updated card.
     */
    #[JsonProperty('object')]
    private ?CardAutomaticallyUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?CardAutomaticallyUpdatedEventObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
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
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?CardAutomaticallyUpdatedEventObject
     */
    public function getObject(): ?CardAutomaticallyUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?CardAutomaticallyUpdatedEventObject $value
     */
    public function setObject(?CardAutomaticallyUpdatedEventObject $value = null): self
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
