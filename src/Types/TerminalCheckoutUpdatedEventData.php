<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalCheckoutUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the updated object’s type, `"checkout"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the updated terminal checkout.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TerminalCheckoutUpdatedEventObject $object An object containing the updated terminal checkout
     */
    #[JsonProperty('object')]
    private ?TerminalCheckoutUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TerminalCheckoutUpdatedEventObject,
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
     * @return ?TerminalCheckoutUpdatedEventObject
     */
    public function getObject(): ?TerminalCheckoutUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TerminalCheckoutUpdatedEventObject $value
     */
    public function setObject(?TerminalCheckoutUpdatedEventObject $value = null): self
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
