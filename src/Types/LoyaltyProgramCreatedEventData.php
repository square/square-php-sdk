<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The data associated with a `loyalty.program.created` event.
 */
class LoyaltyProgramCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object affected by the event. For this event, the value is `loyalty_program`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the created loyalty program.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?LoyaltyProgramCreatedEventObject $object An object that contains the loyalty program that was created.
     */
    #[JsonProperty('object')]
    private ?LoyaltyProgramCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?LoyaltyProgramCreatedEventObject,
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
     * @return ?LoyaltyProgramCreatedEventObject
     */
    public function getObject(): ?LoyaltyProgramCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?LoyaltyProgramCreatedEventObject $value
     */
    public function setObject(?LoyaltyProgramCreatedEventObject $value = null): self
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
