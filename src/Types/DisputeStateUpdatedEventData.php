<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DisputeStateUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected dispute's type.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected dispute.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?DisputeStateUpdatedEventObject $object An object containing fields and values relevant to the event.
     */
    #[JsonProperty('object')]
    private ?DisputeStateUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?DisputeStateUpdatedEventObject,
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
     * @return ?DisputeStateUpdatedEventObject
     */
    public function getObject(): ?DisputeStateUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?DisputeStateUpdatedEventObject $value
     */
    public function setObject(?DisputeStateUpdatedEventObject $value = null): self
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
