<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The data associated with a `loyalty.account.created` event.
 */
class LoyaltyAccountCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object affected by the event. For this event, the value is `loyalty_account`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the affected loyalty account.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?LoyaltyAccountCreatedEventObject $object An object that contains the new loyalty account.
     */
    #[JsonProperty('object')]
    private ?LoyaltyAccountCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?LoyaltyAccountCreatedEventObject,
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
     * @return ?LoyaltyAccountCreatedEventObject
     */
    public function getObject(): ?LoyaltyAccountCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?LoyaltyAccountCreatedEventObject $value
     */
    public function setObject(?LoyaltyAccountCreatedEventObject $value = null): self
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
