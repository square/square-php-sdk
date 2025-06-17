<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PayoutFailedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The name of the affected object's type, `payout`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the failed payout.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?PayoutFailedEventObject $object An object containing the failed payout.
     */
    #[JsonProperty('object')]
    private ?PayoutFailedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?PayoutFailedEventObject,
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
     * @return ?PayoutFailedEventObject
     */
    public function getObject(): ?PayoutFailedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?PayoutFailedEventObject $value
     */
    public function setObject(?PayoutFailedEventObject $value = null): self
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
