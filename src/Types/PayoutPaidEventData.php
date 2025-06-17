<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PayoutPaidEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"payout"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the completed payout.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?PayoutPaidEventObject $object An object containing the completed payout.
     */
    #[JsonProperty('object')]
    private ?PayoutPaidEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?PayoutPaidEventObject,
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
     * @return ?PayoutPaidEventObject
     */
    public function getObject(): ?PayoutPaidEventObject
    {
        return $this->object;
    }

    /**
     * @param ?PayoutPaidEventObject $value
     */
    public function setObject(?PayoutPaidEventObject $value = null): self
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
