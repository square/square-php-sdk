<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The data associated with a `gift_card.customer_linked` event.
 */
class GiftCardCustomerLinkedEventData extends JsonSerializableType
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
     * @var ?GiftCardCustomerLinkedEventObject $object An object that contains the updated gift card and the ID of the linked customer.
     */
    #[JsonProperty('object')]
    private ?GiftCardCustomerLinkedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?GiftCardCustomerLinkedEventObject,
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
     * @return ?GiftCardCustomerLinkedEventObject
     */
    public function getObject(): ?GiftCardCustomerLinkedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?GiftCardCustomerLinkedEventObject $value
     */
    public function setObject(?GiftCardCustomerLinkedEventObject $value = null): self
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
