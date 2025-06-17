<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalCheckoutCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the created object’s type, `"checkout"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the created terminal checkout.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TerminalCheckoutCreatedEventObject $object An object containing the created terminal checkout
     */
    #[JsonProperty('object')]
    private ?TerminalCheckoutCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TerminalCheckoutCreatedEventObject,
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
     * @return ?TerminalCheckoutCreatedEventObject
     */
    public function getObject(): ?TerminalCheckoutCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TerminalCheckoutCreatedEventObject $value
     */
    public function setObject(?TerminalCheckoutCreatedEventObject $value = null): self
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
