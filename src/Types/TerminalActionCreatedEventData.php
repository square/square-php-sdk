<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalActionCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the created object’s type, `"action"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the created terminal action.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TerminalActionCreatedEventObject $object An object containing the created terminal action.
     */
    #[JsonProperty('object')]
    private ?TerminalActionCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TerminalActionCreatedEventObject,
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
     * @return ?TerminalActionCreatedEventObject
     */
    public function getObject(): ?TerminalActionCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TerminalActionCreatedEventObject $value
     */
    public function setObject(?TerminalActionCreatedEventObject $value = null): self
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
