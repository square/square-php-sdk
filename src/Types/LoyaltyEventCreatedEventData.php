<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The data associated with a `loyalty.event.created` event.
 */
class LoyaltyEventCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object affected by the event. For this event, the value is `loyalty_event`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected loyalty event.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?LoyaltyEventCreatedEventObject $object An object that contains the new loyalty event.
     */
    #[JsonProperty('object')]
    private ?LoyaltyEventCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?LoyaltyEventCreatedEventObject,
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
     * @return ?LoyaltyEventCreatedEventObject
     */
    public function getObject(): ?LoyaltyEventCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?LoyaltyEventCreatedEventObject $value
     */
    public function setObject(?LoyaltyEventCreatedEventObject $value = null): self
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
