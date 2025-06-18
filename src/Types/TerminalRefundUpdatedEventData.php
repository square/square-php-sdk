<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalRefundUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the updated object’s type, `"refund"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the updated terminal refund.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TerminalRefundUpdatedEventObject $object An object containing the updated terminal refund.
     */
    #[JsonProperty('object')]
    private ?TerminalRefundUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TerminalRefundUpdatedEventObject,
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
     * @return ?TerminalRefundUpdatedEventObject
     */
    public function getObject(): ?TerminalRefundUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TerminalRefundUpdatedEventObject $value
     */
    public function setObject(?TerminalRefundUpdatedEventObject $value = null): self
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
