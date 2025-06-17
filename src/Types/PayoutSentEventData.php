<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PayoutSentEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"payout"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the sent payout.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?PayoutSentEventObject $object An object containing the sent payout.
     */
    #[JsonProperty('object')]
    private ?PayoutSentEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?PayoutSentEventObject,
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
     * @return ?PayoutSentEventObject
     */
    public function getObject(): ?PayoutSentEventObject
    {
        return $this->object;
    }

    /**
     * @param ?PayoutSentEventObject $value
     */
    public function setObject(?PayoutSentEventObject $value = null): self
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
