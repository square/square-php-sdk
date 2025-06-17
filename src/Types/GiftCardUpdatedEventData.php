<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The data associated with a `gift_card.updated` event.
 */
class GiftCardUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object affected by the event. For this event, the value is `gift_card`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the updated gift card.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?GiftCardUpdatedEventObject $object An object that contains the updated gift card.
     */
    #[JsonProperty('object')]
    private ?GiftCardUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?GiftCardUpdatedEventObject,
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
     * @return ?GiftCardUpdatedEventObject
     */
    public function getObject(): ?GiftCardUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?GiftCardUpdatedEventObject $value
     */
    public function setObject(?GiftCardUpdatedEventObject $value = null): self
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
