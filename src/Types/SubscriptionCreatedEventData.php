<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class SubscriptionCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"subscription"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected subscription.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?SubscriptionCreatedEventObject $object An object containing the created subscription.
     */
    #[JsonProperty('object')]
    private ?SubscriptionCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?SubscriptionCreatedEventObject,
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
     * @return ?SubscriptionCreatedEventObject
     */
    public function getObject(): ?SubscriptionCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?SubscriptionCreatedEventObject $value
     */
    public function setObject(?SubscriptionCreatedEventObject $value = null): self
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
