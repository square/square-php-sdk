<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalRefundCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the created object’s type, `"refund"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the created terminal refund.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TerminalRefundCreatedEventObject $object An object containing the created terminal refund.
     */
    #[JsonProperty('object')]
    private ?TerminalRefundCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TerminalRefundCreatedEventObject,
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
        $this->_setField('type');
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
        $this->_setField('id');
        return $this;
    }

    /**
     * @return ?TerminalRefundCreatedEventObject
     */
    public function getObject(): ?TerminalRefundCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TerminalRefundCreatedEventObject $value
     */
    public function setObject(?TerminalRefundCreatedEventObject $value = null): self
    {
        $this->object = $value;
        $this->_setField('object');
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
